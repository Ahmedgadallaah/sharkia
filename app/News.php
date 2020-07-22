<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class News extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['image','type'];
    public $translatedAttributes = ['name', 'date','description'];

    public function gallery(){
        return $this->hasMany(NewsGallery::class);
    }
}
