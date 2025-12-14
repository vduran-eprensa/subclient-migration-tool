<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class article_authors extends Model
{
    protected static $unguarded = true;

    protected $table = "article_authors";
    public $timestamps = false;
}
