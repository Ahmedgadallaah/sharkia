<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Sport extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['image','name','description'];
    public $translatedAttributes = ['name','description'];
}
