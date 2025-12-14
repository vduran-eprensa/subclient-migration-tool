<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class alert_contacts extends Model
{
    protected static $unguarded = true;

    protected $table = "alert_contacts";
    public $timestamps = false;
}
