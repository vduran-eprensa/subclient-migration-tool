<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class subclients_reports extends Model
{
    protected static $unguarded = true;
    protected $table = "subclients_reports";
    public $timestamps = false;
}
