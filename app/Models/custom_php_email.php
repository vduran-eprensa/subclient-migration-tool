<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class custom_php_email extends Model
{
    protected static $unguarded = true;
    protected $table = "custom_php_email";
    public $timestamps = false;
}
