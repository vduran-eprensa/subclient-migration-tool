<?php

namespace App\Helpers;

use App\Jobs\AsyncProcess;
use App\Models\companies;
use App\Models\SubclientMigration;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MigrationHelpers{

    public static function getTableDependencies($tablename){
        $map = config("migration_map.entities");
        $rels = ($map[$tablename]??["relations"=>[]])["relations"];
        $resp = [];
        foreach($rels as $col=>$fk){
            $fk = explode(".",$fk);
            $resp[]=[
                "col"=>$col,
                "ft"=>$fk[0],
                "fc"=>$fk[1]
            ];
        }
        return $resp;
    }

    /**
     * Migrates current element and recursively all of the referenced columns configured in the mapping.
     * @param mixed $tablename: table to migrate
     * @param mixed $idfield: name of the ID field
     * @param mixed $record_id: ID to migrate. A new ID will be generated in target DB, returned and associated in the source DB subclient_mapping table.
     */
    public static function migrateElement($tablename, $idfield, $record_id){
        if(!$record_id) return null;
        $map = config("migration_map.entities");

        $cached_id = Cache::get("$tablename:$record_id",null);
        if($cached_id){
            Log::info("Cache hit: $tablename($record_id) => $cached_id");
            return $cached_id;
        }

        // Check element hasn't been migrated. If it has, return it from the new DB
        $exists = SubclientMigration::where("tablename","=",$tablename)
                            ->where("source_id","=",$record_id)
                            ->first();                      
        if($exists){ 
            Log::info("Migrated hit: $tablename($record_id) => $exists[target_id]  ?>caching");
            Cache::put("$tablename:$record_id",$exists["target_id"]);
            return $exists["target_id"];
        }

        /** @var class-string<Model> $cls */
        $cls = "App\\Models\\$tablename";

        // Query element by ID
        $rec = $cls::where($idfield,"=",$record_id)->first();

        if(!$rec){
            Log::info("Source record $tablename($record_id) not found in source.");
            // Cache::put("$tablename:$record_id",null);
            return null;
        }
        
        // Check unique fields are not already in target
        if( ($map[$tablename]??["unique_by"=>null])["unique_by"]??null ){
            $uniq_query = $cls::on("pgtarget");
            foreach($map[$tablename]["unique_by"] as $uq){
                $uniq_query->where($uq, "=", $rec[$uq]);
            }
            $exists = $uniq_query->first();
            if($exists){
                Log::info("Record {$tablename}($record_id) exists in target with ID={$exists[$idfield]}");
                SubclientMigration::create([
                    "tablename"=>$tablename,
                    "source_id"=>$record_id,
                    "target_id"=>$exists[$idfield]
                ]);
                Cache::put("$tablename:$record_id",$exists[$idfield]);
            }
            return $exists[$idfield];
        }

        Log::info("Migrating: {$tablename}[{$rec[$idfield]}]");

        // look for references and migrate reference obtaining ID from referred
        $dependencies = self::getTableDependencies($tablename);
        foreach($dependencies as $d){
            // Overwrite field with obtained id (Do this for all)
            // Do something with cycles (subclients.id/subclients.sister_subclient_id)
            $migrated_id = self::migrateElement($d['ft'], $d['fc'], $rec[$d["col"]]);
            
            if($migrated_id == NULL && $rec[$d["col"]]!=NULL){
                if( ($map[$tablename]["missing_fk"][$d["col"]]??'NULL')=='same_id'  ){
                    $migrated_id = $rec[$d["col"]];
                }
                elseif( preg_match("/^SET=(\d+)$/", $map[$tablename]["missing_fk"][$d["col"]]??'NULL', $matches)  ){
                    $migrated_id = $matches[1];
                }
                elseif( ($map[$tablename]["missing_fk"][$d["col"]]??'NULL')=='skip'  ){
                    return null;
                }
            }
            $rec[$d["col"]] = $migrated_id;
        }

        // Force set values if any
        foreach($map[$tablename]["set"]??[] as $col=>$val){
            Log::info("SET forced for $tablename.$col = '$val'");
            $rec[$col] = $val;
        }
        
        $object_array = $rec->toArray();
        unset($object_array[$idfield]);

        $inserted_record = DB::transaction(function () use ($cls,$object_array) {
            DB::connection("pgtarget")->statement("SET session_replication_role = replica");
            // Save in 2nd db
            return $cls::on("pgtarget")->create($object_array);
        });

        Log::info("Mapped: Source: {$tablename}[{$rec[$idfield]}]| Target: {$tablename}[{$inserted_record[$idfield]}]");
        // Save mapping
        SubclientMigration::create([
            "tablename"=>$tablename,
            "source_id"=>$record_id,
            "target_id"=>$inserted_record[$idfield]
        ]);
        
        Cache::put("$tablename:$record_id",$inserted_record[$idfield]);

        return $inserted_record[$idfield];
    }

    public static function generateFiltered($table, $scope_id){
        $map = config("migration_map.entities");
        $main_table = "subclients";
        /** @var class-string<Model> $tcl */
        $tcl = "App\\Models\\$table";
        $obj = new $tcl();
        foreach($map[$table]["relations"] as $source_col=>$target_tc){
            $ftab = explode(".",$target_tc)[0];
            if($ftab==$main_table){
                /** @var class-string<Model> $tcl */
                $obj = $obj->where($source_col,"=",$scope_id);
            }
        }
        return $obj;
    }

    /**
     * Searches for tables with references to the table $tablename
     * @param mixed $tablename
     * @param mixed $idfield
     * @param mixed $record_id
     * @param mixed $scope ID of the "main table" from the migration_map that will be filtered when possible
     * @return void
     */
    public static function searchDependants($tablename, $idfield, $record_id, $scope_id, $path=""){

        // $is_in_process = Cache::get("inproc:$tablename:$record_id");
        // if($is_in_process) return;
        // Cache::put("inproc:$tablename:$record_id", true);

        Log::info(">>> PATH=$path");

        $tables = [];
        $map = config("migration_map.entities");
        // Search in the map relationships pointing to $tablename
        foreach($map as $t=>$def){
            foreach($def["relations"] as $col=>$fk){
                $ftab = explode(".",$fk)[0];
                if($ftab == $tablename && !in_array($col,$def["cut"]??[])){
                    $tables[]=[
                        "tname"=>$t, // Referencing table
                        "col"=>$col, // Referencing column
                    ];
                }
            }
        }

        // For each table list the elements where the reference point to this record (where $fkfield = $record_id)
        foreach($tables as $t){
            Log::info("Processing $t[tname]");
            $filtered = self::generateFiltered($t["tname"],$scope_id);
            
            $q = $filtered->where($t["col"],"=",$record_id)->getQuery();
            Log::info($q->toRawSql());

            $is_async = $map[$t["tname"]]["async"]??false;

            $filtered->where($t["col"],"=",$record_id)->chunk(2000,function(Collection $recs) use ($t,$scope_id,$tablename,$record_id,$path, $is_async){
                Log::info("Processing: $t[tname] records => ".count($recs));
                foreach($recs as $tr){

                    if($is_async){
                        if(Cache::get("QUEUED:$t[tname]:$tr[id]")){
                            Log::info("Record $t[tname]:$tr[id] is already queued. Skipping...");
                            continue;
                        }
                        AsyncProcess::dispatch($t["tname"], $tr["id"], $scope_id, $path);
                        Cache::put("QUEUED:$t[tname]:$tr[id]",true);
                        continue;
                    }

                    // For each element, invoke migrate element to migrte the reference
                    // TODO: $tr[id]. The "id" index should come from somehwere. For now all of the IDs are called "id" and this will work
                    Log::info("migrateElement($t[tname], 'id', $tr[id])");
                    self::migrateElement($t["tname"], "id", $tr["id"]);

                    Log::info("Searching dependants for($t[tname], 'id', $tr[id])");
                    // TODO: Call search dependants of this record in order to migrate them
                    self::searchDependants($t["tname"], 'id', $tr["id"], $scope_id, "$path.$tablename($record_id)");
                }
            });
        }

        

        //TODO: Find where to add the scope of the migration to avoid eg migrating contact X references in contact_has_subclient and this migrates all subclients. Restrict to only the initially given subclient

        // TODO: Avoid this:
        /*
        [2025-12-14 21:57:24] local.INFO: Processing: hit_by records => 1
        [2025-12-14 21:57:24] local.INFO: migrateElement(hit_by, 'id', 1534652619)
        [2025-12-14 21:57:24] local.INFO: Cache hit: hit_by(1534652619) => 1523402765
        [2025-12-14 21:57:24] local.INFO: Searching dependants for(hit_by, 'id', 1534652619)
        [2025-12-14 21:57:24] local.INFO: >>> PATH=.subclients(27372).temas(524407).keywords(934113)
        [2025-12-14 21:57:24] local.INFO: Processing original_hits
        [2025-12-14 21:57:24] local.INFO: select * from "original_hits" where "keyword_id" = 934113
        */

    }


}