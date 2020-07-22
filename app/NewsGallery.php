<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsGallery extends Model
{
    protected $fillable = ['images','News_id'];
    public $timestamps = false;

    public function news(){
        return $this->belongsTo(News::class);
    }
}
