<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsideTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['description','name'];
}
