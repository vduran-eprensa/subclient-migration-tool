<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class template_uses_script extends Model
{
    protected static $unguarded = true;
    protected $table = "template_uses_script";
    public $timestamps = false;
}
