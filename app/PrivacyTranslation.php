<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['description'];
}
