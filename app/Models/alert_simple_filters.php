<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class alert_simple_filters extends Model
{
    protected static $unguarded = true;

    protected $table = "alert_simple_filters";
    public $timestamps = false;
}
