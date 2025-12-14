<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class original_hits extends Model
{
    protected static $unguarded = true;
    protected $table = "original_hits";
    public $timestamps = false;
}
