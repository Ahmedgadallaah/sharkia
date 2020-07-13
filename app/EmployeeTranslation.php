<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
