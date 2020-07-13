<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Employee extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['image','cv','type'];
    public $translatedAttributes = ['name'];



}





