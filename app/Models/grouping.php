<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class grouping extends Model
{
    protected static $unguarded = true;
    protected $table = "grouping";
    public $timestamps = false;
}
