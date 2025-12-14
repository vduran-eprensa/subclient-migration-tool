<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class templates_report extends Model
{
    protected static $unguarded = true;
    protected $table = "templates_report";
    public $timestamps = false;
}
