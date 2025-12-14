<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class alert_custom_php extends Model
{
    protected static $unguarded = true;

    protected $table = "alert_custom_php";
    public $timestamps = false;
}
