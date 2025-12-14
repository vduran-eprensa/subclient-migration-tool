<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class av_clients_packs extends Model
{
    protected static $unguarded = true;

    protected $table = "av_clients_packs";
    public $timestamps = false;
}
