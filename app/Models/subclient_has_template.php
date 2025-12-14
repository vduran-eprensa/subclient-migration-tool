<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class subclient_has_template extends Model
{
    protected static $unguarded = true;
    protected $table = "subclient_has_template";
    public $timestamps = false;
}
