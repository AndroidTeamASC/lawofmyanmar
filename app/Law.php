<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    protected $fillable = ['name','type','main','published_date','release_date','department_id','region_id','law_no'];
}
