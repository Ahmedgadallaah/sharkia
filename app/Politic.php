<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Politic extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['pdf'];
    public $translatedAttributes = ['name'];

}
