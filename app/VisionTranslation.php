<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['vision','hope','goal'];
}
