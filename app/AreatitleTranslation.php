<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreatitleTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
