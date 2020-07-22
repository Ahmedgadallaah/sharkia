<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
