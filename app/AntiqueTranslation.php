<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntiqueTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
