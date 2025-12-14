<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class alert_instance extends Model
{
    protected static $unguarded = true;

    protected $table = "alert_instance";
    public $timestamps = false;
}
