<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class rrss extends Model
{
    protected static $unguarded = true;
    protected $table = "rrss";
    public $timestamps = false;
}
