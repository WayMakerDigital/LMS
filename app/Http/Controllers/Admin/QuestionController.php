<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionOption;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('question.index', compact('questions'));
    }

    public function create()
    {
        return view('question.new');
    }

    public function edit($id)
    {
        $question = Question::find($id);

        return view('question.edit', compact('question'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
           'question'=>'required',
        ]);

        $question = Question::create($request->all());

        $question_option = new QuestionOption; 
        
        for($q=1; $q<=4; $q++){
         $correct = $request->input('correct_' . $q);
         if($correct != 1)
         {
             $correct = 0;
         }
          $option = $request->input('option_text_'.$q, '');
        
          if($option != ''){
              $question_option::create([
                  'question_id'=> $question->id,
                   'option_text'=>$option,
                   'correct'=> $correct
              ]);
          }
        }

        return redirect()->back()->with('success', 'New Question has been created succesfully');
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
           'question'=>'required'
        ]);

        $question = Question::findorFail($id);
       // dd($question);

        $question->update($request->all());


        return redirect()->back()->with('success', 'Question has been updated succesfully');
    }


    public function delete($id)
    {
      $question = Question::find($id);

      $question->delete();

      return redirect()->back()->with('info', 'Question has been deleted successfully');

    }

    
}
