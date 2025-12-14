<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class tema_values extends Model
{
    protected static $unguarded = true;
    protected $table = "tema_values";
    public $timestamps = false;
}
