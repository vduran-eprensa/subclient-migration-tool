<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class grss_feed_to_keyword_subscription extends Model
{
    protected static $unguarded = true;
    protected $table = "grss_feed_to_keyword_subscription";

    public $timestamps = false;
}
