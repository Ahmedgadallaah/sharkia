<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServurgentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
