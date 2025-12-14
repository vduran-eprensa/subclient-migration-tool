<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class telegram_templates extends Model
{
    protected static $unguarded = true;
    protected $table = "telegram_templates";
    public $timestamps = false;
}
