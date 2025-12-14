<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class hallon_eyes_purchases extends Model
{
    protected static $unguarded = true;
    protected $table = "hallon_eyes_purchases";
    public $timestamps = false;
}
