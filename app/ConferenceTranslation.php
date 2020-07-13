<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['description'];
}
