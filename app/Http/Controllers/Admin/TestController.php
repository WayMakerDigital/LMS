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

        $questions = Question::all();

        $modules = Module::all();
        
        return view('test.edit', compact('test', 'questions', 'modules'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
           'title'=>'required',
           'module'=>'required',
           'questions'=>'required'
        ]);

        $test = new Test;

        $test->title = $request->title;
        
        $test->module_id = $request->module;

        $test->save();
 
        foreach($request->questions as $question_id) {     
        $test->questions()->attach([$question_id]);
        };
 
        return redirect()->back()->with('success', 'Test has been created succesfully');
    }

    public function update(Request $request, $id)
    {
     
        $test = Test::findorFail($id);
       // dd($question);

        $test->update($request->all());

        $test->questions()->sync($request->questions);

        return redirect()->back()->with('success', 'Test has been updated succesfully');
    }


    public function delete($id)
    {
      $test = Test::find($id);

      $test->delete();

      return redirect()->back()->with('info', 'Test has been deleted successfully');

    }

    
}
