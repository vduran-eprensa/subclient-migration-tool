<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class google_rss_feed extends Model
{
    protected static $unguarded = true;
    protected $table = "google_rss_feed";
    public $timestamps = false;
}
