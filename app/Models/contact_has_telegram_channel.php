<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class contact_has_telegram_channel extends Model
{
    protected static $unguarded = true;
    protected $table = "contact_has_telegram_channel";
    public $timestamps = false;
}
