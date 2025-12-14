<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class papers_sections extends Model
{
    protected static $unguarded = true;
    protected $table = "papers_sections";
    public $timestamps = false;
}
