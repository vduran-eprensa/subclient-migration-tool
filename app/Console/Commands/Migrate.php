<?php

namespace App\Console\Commands;

use App\Helpers\MigrationHelpers;
use App\Models\carpetas;
use App\Models\subclients;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Migrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subclient:migrate {source_subclient_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate source subclient_id to another database';


    public function handle(){

        $source_subclient_id = $this->argument("source_subclient_id");

        Log::info("PARAMS: $source_subclient_id");

        $main_table = "subclients";
        $default_field = config("migration_map.default_pk");

        Log::info("Migrating subclient: $main_table.$source_subclient_id");

        $migrated_id = MigrationHelpers::migrateElement($main_table, $default_field, $source_subclient_id);
        MigrationHelpers::searchDependants($main_table, $default_field, $source_subclient_id, $source_subclient_id);

        
        $sister = subclients::where("id","=",$source_subclient_id)->first(["sister_subclient_id"]);
        Log::info("Migrating sister subclient: $main_table.$sister[sister_subclient_id]");

        $migrated_sister_id = MigrationHelpers::migrateElement($main_table, $default_field, $sister["sister_subclient_id"]);
        MigrationHelpers::searchDependants($main_table, $default_field, $sister["sister_subclient_id"], $sister["sister_subclient_id"]);

        Log::info("Updating sister_subclient_id");
        subclients::on("pgtarget")->where("id","=",$migrated_id)->update( ["sister_subclient_id"=> $migrated_sister_id ] );
        subclients::on("pgtarget")->where("id","=",$migrated_sister_id)->update( ["sister_subclient_id"=> $migrated_id ] );
        
        Log::info("Migrated subclients: $migrated_id, $migrated_sister_id");


    }
}
