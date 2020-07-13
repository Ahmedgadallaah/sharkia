<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShamapTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
