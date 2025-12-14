<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class manual_domains extends Model
{
    protected static $unguarded = true;
    protected $table = "manual_domains";
    public $timestamps = false;
}
