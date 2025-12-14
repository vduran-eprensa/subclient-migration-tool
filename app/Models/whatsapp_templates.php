<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class whatsapp_templates extends Model
{
    protected static $unguarded = true;
    protected $table = "whatsapp_templates";
    public $timestamps = false;
}
