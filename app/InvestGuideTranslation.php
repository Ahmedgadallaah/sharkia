<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestGuideTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['city', 'company','address'];
}
