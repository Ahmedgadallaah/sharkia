<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class InvEgytitle extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['pdf','invest_egyptmap_id'];
    public $translatedAttributes = ['name'];

    public function egyptmap(){
        return $this->belongsTo(InvestEgyptmap::class);
    }
}
