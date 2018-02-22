<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Module;
use App\Course;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
     public function create()
    {
      $courses = Course::all();
      $rank_numbers = range(1, 13);
      return view('module.new', compact('courses', 'rank_numbers'));
    }

    public function index()
    {
    	$modules = Module::all();


    	return view('module.index', compact('modules'));
    }

    public function store(Request $request)
    {
     
       $this->validate($request, [
        'title' => 'required|min:3',
        'description' =>'required|min:5',
         'module_rank' => 'required',
         'course'=>'required',
    	]);
  
    $title = $request->title;
    $slug = str_slug($title, '-');

    $module = new Module;

    $module->title = $title;
    $module->course_id = $request->course; 
    $module->description = $request->description;
    $module->slug = $slug;
    $module->rank = $request->module_rank;
    $module->save();
   

   return redirect()->back()->with('success', 'New Module has been created succesfully');
    }

    public function edit($id)
    {
      $module= Module::find($id);

      $courses = Course::all();

      $rank_numbers = range(1, 13);

      return view('module.edit', compact('module', 'courses', 'rank_numbers'));
    }

    public function update(Request $request, $id)
    {
    $this->validate($request, [
        'title' => 'required|min:3',
        'description' =>'required|min:5',
         'module_rank' => 'required',
         'course'=>'required',
    	]);

      $title = $request->title;
      $update_slug = str_slug($title, '-');
      $description = $request->description;

      $module = Module::find($id);

    $module->title = $title;
    $module->description = $description;
    $module->course_id = $request->course; 
    $module->slug = $update_slug;
    $module->rank = $request->module_rank;
    $module->save();
   
   return redirect()->back()->with('success', 'Module has been updated succesfully');
    }

    public function delete($id)
    {
    	$module = Module::find($id);
    	$module->delete();

    	return redirect()->back()->with('info', 'Module has been deleted successfully');
    }
}
