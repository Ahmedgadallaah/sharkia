<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Job extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['id','link'];
    public $translatedAttributes = ['name'];
}
