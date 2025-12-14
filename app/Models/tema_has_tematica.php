<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class tema_has_tematica extends Model
{
    protected static $unguarded = true;
    protected $table = "tema_has_tematica";
    public $timestamps = false;
}
