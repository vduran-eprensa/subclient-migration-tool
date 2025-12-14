<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class carpetas_values extends Model
{
    protected static $unguarded = true;
    protected $table = "carpetas_values";
    public $timestamps = false;
}
