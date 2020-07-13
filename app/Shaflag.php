<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Shaflag extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['id','shaflagcat_id','image'];
    public $translatedAttributes = ['name'];
    public function shaflagcat(){
        return $this->belongsTo(Shaflag::class);
    }
}
