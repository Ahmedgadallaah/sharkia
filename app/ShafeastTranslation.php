<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShafeastTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
