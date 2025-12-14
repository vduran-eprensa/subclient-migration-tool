<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class cifs extends Model
{
    protected static $unguarded = true;
    protected $table = "cifs";
    public $timestamps = false;
}
