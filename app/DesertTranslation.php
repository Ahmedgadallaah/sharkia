<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesertTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
