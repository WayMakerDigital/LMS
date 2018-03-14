<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function course()
    {
    	return $this->belongsTo('App\Course');
    }
    
    public function topics()
    {
    return $this->hasMany('App\Topic');
   }
}
