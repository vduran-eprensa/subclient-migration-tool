<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class companies_has_tema extends Model
{
    protected static $unguarded = true;
    protected $table = "companies_has_tema";
    public $timestamps = false;
}
