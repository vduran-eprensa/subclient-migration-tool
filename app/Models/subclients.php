<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class subclients extends Model
{
    protected static $unguarded = true;
    protected $table = "subclients";
    public $timestamps = false;
}
