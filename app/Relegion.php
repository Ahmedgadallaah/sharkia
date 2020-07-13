<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Relegion extends Model implements TranslatableContract
{
    use Translatable;


    public $translatedAttributes = ['description'];
}
