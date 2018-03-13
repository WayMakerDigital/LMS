<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\CourseCategory;
use App\Http\Controllers\Controller;

class CourseCategoryController extends Controller
{
     public function index()
	{
        $categories = CourseCategory::all();

		return view('Coursecategory.index', compact('categories'));
	}

    public function create()
    {
      $categories = CourseCategory::all();
    	return view('Coursecategory.new', compact('categories'));
    }

     public function store(Request $request)
    {
    	$this->validate($request, [ 
         'title'=> 'required|min:3',
      
       ]);

          $category = new CourseCategory;

          $category->title = $request->title;
          
              $category->save();

      return redirect()->back()->with('success', 'New category has been created succesfully');
  }
    
     public function destroy($id)
    {

      $category = CourseCategory::find($id);
      
      $category->courses()->detach();

      $category->delete();

      return redirect()->back()->with('success', 'Category has been deleted successfully');

    }
}
