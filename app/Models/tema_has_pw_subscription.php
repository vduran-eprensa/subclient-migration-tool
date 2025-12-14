<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class tema_has_pw_subscription extends Model
{
    protected static $unguarded = true;
    protected $table = "tema_has_pw_subscription";
    public $timestamps = false;
}
