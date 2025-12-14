<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class instance_from_alias extends Model
{
    protected static $unguarded = true;
    protected $table = "instance_from_alias";
    public $timestamps = false;
}
