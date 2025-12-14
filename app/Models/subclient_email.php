<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class subclient_email extends Model
{
    protected static $unguarded = true;
    protected $table = "subclient_email";
    public $timestamps = false;
}
