<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class custom_view_types extends Model
{
    protected static $unguarded = true;
    protected $table = "custom_view_types";
    public $timestamps = false;
}
