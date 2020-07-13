<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaGallery extends Model
{
    protected $fillable = ['image','area_id'];

    public function title(){
        return $this->belongsTo(Areatitle::class);
    }
}
