<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class companies_values extends Model
{
    protected static $unguarded = true;
    protected $table = "companies_values";
    public $timestamps = false;
}
