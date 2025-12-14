<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class datastudio_informe extends Model
{
    protected static $unguarded = true;
    protected $table = "datastudio_informe";
    public $timestamps = false;
}
