<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class InvestGuide extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['mobile','fax','member_num'];
    public $translatedAttributes = ['city', 'company','address'];

}
