<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class attachment_options extends Model
{
    protected static $unguarded = true;

    protected $table = "attachment_options";
    public $timestamps = false;
}
