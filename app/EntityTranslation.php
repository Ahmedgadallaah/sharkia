<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
