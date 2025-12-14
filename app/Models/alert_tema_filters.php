<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class alert_tema_filters extends Model
{
    protected static $unguarded = true;

    protected $table = "alert_tema_filters";
    public $timestamps = false;
}
