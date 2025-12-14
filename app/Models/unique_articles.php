<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class unique_articles extends Model
{
    protected static $unguarded = true;
    protected $table = "unique_articles";
    public $timestamps = false;
}
