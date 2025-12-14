<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class alert_timeslots extends Model
{
    protected static $unguarded = true;

    protected $table = "alert_timeslots";
    public $timestamps = false;
}
