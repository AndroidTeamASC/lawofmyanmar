<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['name','chapter_id'];

    public function chapter($value='')
    {
    	return $this->belongsTo('App\Chapter');
    }
}
