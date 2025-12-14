<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class mailgun_accounts extends Model
{
    protected static $unguarded = true;
    protected $table = "mailgun_accounts";
    public $timestamps = false;
}
