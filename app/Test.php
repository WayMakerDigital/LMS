<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
