<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use App\Question;

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
    
    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
      $question = Question::find($id);

      $question->questionOptions()->detach();

      $question->delete();

      return redirect()->back()->with('info', 'Post has been deleted successfully');

    }

    
}
