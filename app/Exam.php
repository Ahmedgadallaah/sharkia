<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Exam extends Model implements TranslatableContract
{
    use Translatable;


    protected $fillable = ['image'];
    public $translatedAttributes = ['name'];

    public function examtitle(){
        return $this->hasMany(Examtitle::class);
    }
}
