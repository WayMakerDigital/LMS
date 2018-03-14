<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function questionOptions()
    {
        return $this->hasMany('App\QuestionOption');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }
}
