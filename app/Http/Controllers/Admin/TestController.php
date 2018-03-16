<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Test;
use App\Module;
use App\Question;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
     public function index()
    {
        $tests = Test::all();

        return view('test.index', compact('tests'));
    }

    public function create()
    {
        $modules = Module::all();

        $questions = Question::all();

        return view('test.new', compact('modules', 'questions'));
    }

    public function edit($id)
    {
        $test = test::find($id);

        return view('test.edit', compact('test'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
           'test'=>'required',
        ]);

        $test = Test::create($request->all());
       
        $test->questions->attach($question_id);
 
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
