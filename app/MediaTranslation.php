<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'date','description'];
}
