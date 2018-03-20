<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    protected $fillable = ['title', 'module_id'];
    
    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'question_test', 'test_id', 'question_id');
    }
}
