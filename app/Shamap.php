<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Shamap extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['id'];
    public $translatedAttributes = ['name','description'];
}
