<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Areatitle extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['image','invest_area_id'];
    public $translatedAttributes = ['name','description'];

    public function area(){
        return $this->belongsTo(InvestArea::class);
    }

    public function gallery(){
        return $this->hasMany(AreaGallery::class);
    }

}
