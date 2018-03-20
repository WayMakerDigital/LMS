<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['question', 'score'];
    
    public function questionOptions()
    {
        return $this->hasMany('App\QuestionOption');
    }

    public function tests()
    {
        return $this->hasMany('App\Test', 'question_test', 'question_id', 'test_id');
    }
}
