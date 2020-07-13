<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShalineTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
