<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
    protected $fillable = ['images','media_id'];
    public $timestamps = false;

    public function media(){
        return $this->belongsTo(Media::class);
    }
}
