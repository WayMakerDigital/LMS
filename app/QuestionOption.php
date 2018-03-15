<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $fillable = ['question_id', 'option_text', 'correct'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
