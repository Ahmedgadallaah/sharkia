<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovernerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'date'];
}
