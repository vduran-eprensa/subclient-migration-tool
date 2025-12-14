<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class headers_templates extends Model
{
    protected static $unguarded = true;
    protected $table = "headers_templates";
    public $timestamps = false;
}
