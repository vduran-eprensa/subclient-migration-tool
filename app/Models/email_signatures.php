<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class email_signatures extends Model
{
    protected static $unguarded = true;
    protected $table = "email_signatures";
    public $timestamps = false;
}
