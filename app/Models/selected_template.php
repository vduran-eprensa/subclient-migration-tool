<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class selected_template extends Model
{
    protected static $unguarded = true;
    protected $table = "selected_template";
    public $timestamps = false;
}
