<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = ["name","address","phone","lat","lng"];
}
