<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class clients_cifs extends Model
{
    protected static $unguarded = true;
    protected $table = "clients_cifs";
    public $timestamps = false;
}
