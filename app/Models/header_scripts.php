<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class header_scripts extends Model
{
    protected static $unguarded = true;
    protected $table = "header_scripts";
    public $timestamps = false;
}
