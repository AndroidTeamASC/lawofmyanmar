<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['chapter_no','law_id','section'];
    public function law($value='')
    {
    	return $this->belongsTo('App\Law');
    }
}
