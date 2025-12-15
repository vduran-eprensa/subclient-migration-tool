<?php

namespace App\Console\Commands;

use App\Helpers\MigrationHelpers;
use App\Models\carpetas;
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

        Log::info("TENANT TABLE: $main_table | DEFAULT PRIMARY KEY: $default_field");

        DB::statement("SET session_replication_role = 'replica'");

        $resp = MigrationHelpers::migrateElement($main_table, $default_field, $source_subclient_id);
        

        MigrationHelpers::searchDependants($main_table, $default_field, $source_subclient_id, $source_subclient_id);

        // TODO:
        // Take subclient_id and sister and cross assign + populate usid
        // Update companies USID as well
        // Update companies.secondary_tema_ids

        DB::statement("SET session_replication_role = 'origin'");

    }
}
