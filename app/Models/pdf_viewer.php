<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YMigVal\LaravelModelCache\HasCachedQueries;

class pdf_viewer extends Model
{
    protected static $unguarded = true;
    protected $table = "pdf_viewer";
    public $timestamps = false;
}
