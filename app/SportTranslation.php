<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
