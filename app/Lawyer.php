<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $fillable = ['name','position','lawyer_no','address','phone'];
}
