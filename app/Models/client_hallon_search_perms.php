<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class client_hallon_search_perms extends Model
{
    protected static $unguarded = true;
    protected $table = "client_hallon_search_perms";
    public $timestamps = false;
}
