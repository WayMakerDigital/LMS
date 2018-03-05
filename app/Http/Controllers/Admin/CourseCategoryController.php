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
        
      //  dd($categories);

		return view('Coursecategory.index', compact('categories'));
	}

    public function create()
    {
    	return view('Coursecategory.new');
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

      $category = CourseCategory::find($id)->delete();

      return redirect()->back()->with('info', 'Category has been deleted successfully');

    }
}
