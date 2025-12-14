<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class article_sections extends Model
{
    protected static $unguarded = true;

    protected $table = "article_sections";
    public $timestamps = false;
}
