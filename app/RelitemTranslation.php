<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelitemTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
