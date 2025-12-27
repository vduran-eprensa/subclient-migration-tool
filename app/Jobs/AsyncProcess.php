<?php

namespace App\Jobs;

use App\Helpers\MigrationHelpers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class AsyncProcess implements ShouldQueue
{
    use Queueable;
    private $tablename, $rec_id, $scope_id, $path;

    /**
     * Create a new job instance.
     */
    public function __construct($tablename, $rec_id, $scope_id, $path)
    {
        $this->tablename = $tablename;
        $this->rec_id = $rec_id;
        $this->scope_id = $scope_id;
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle(): void{
        
        Log::info("migrateElement({$this->tablename}, 'id', {$this->rec_id}");
        MigrationHelpers::migrateElement($this->tablename, "id", $this->rec_id);

        Log::info("Searching dependants for($this->tablename, 'id', $this->rec_id)");
        // TODO: Call search dependants of this record in order to migrate them
        MigrationHelpers::searchDependants($this->tablename, 'id', $this->rec_id, $this->scope_id, "{$this->path}.job...");
    }
}
