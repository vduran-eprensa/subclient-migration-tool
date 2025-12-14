<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class SubclientMigration extends Model{
    protected static $unguarded = true;
    public $timestamps = false;
    protected $table = "subclient_migration";

}