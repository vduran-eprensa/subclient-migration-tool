<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class subclient_tiers extends Model
{
    protected static $unguarded = true;
    protected $table = "subclient_tiers";
    public $timestamps = false;
}
