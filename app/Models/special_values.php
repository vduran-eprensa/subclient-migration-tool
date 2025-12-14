<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class special_values extends Model
{
    protected static $unguarded = true;
    protected $table = "special_values";
    public $timestamps = false;
}
