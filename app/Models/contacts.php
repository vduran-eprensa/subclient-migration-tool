<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class contacts extends Model
{
    protected static $unguarded = true;
    protected $table = "contacts";
    public $timestamps = false;
}
