<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class InvestEgyptmap extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['id'];
    public $translatedAttributes = ['description'];

    public function egypttitle(){
        return $this->hasMany('App\InvestEgyptmap','invest_egyptmap_id');
    }

}
