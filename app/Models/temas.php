<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class temas extends Model
{
    protected static $unguarded = true;
    protected $table = "temas";
    public $timestamps = false;
}
