<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class telegram_channels extends Model
{
    protected static $unguarded = true;
    protected $table = "telegram_channels";
    public $timestamps = false;
}
