<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $dates = ['start_date'];

    public function lessons()
    {
    	return $this->hasMany('App\Module');
    }
}
