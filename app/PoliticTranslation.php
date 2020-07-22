<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
