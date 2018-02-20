<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;
use App\Course;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function create()
    {
      return view('course.new');
    }

    public function index()
    {
    	$courses = Course::all();

    	return view('course.index', compact('courses'));
    }

    public function store(Request $request)
    {
    	   $this->validate($request, [
            'title' => 'required|max:50',
            'subtitle' => 'required|max:120',
            'category' => 'required',
            'slug' => 'required|unique:courses,slug'
        ]);

    $title = $request->title;
    dd($title);
    $slug = str_slug($title, '-');
    $image_name = $request->file('course_image')->getClientOriginalName();
    //$filename = $request->file('course_image')->getRealPath();
    $path = $request->file('course_image')->storeAs('public', $image_name);
    $image_url= Storage::url($image_name);

       $course = new Course;

       $course->title = $title;
       $course->description = $request->description;
       $course->slug = $slug;
       $course->price = $request->course_price;
       $course->start_date = $request->start_date;
       $course->image_name = $request->image_name;
       $course->image_url = $request->image_url;
      $course->published = $publish_course;
       $course->free_course = $free_course;

       return redirect()->back()->with('success', 'New Course has been created succesfully');
    }

    public function edit($id)
    {
      $course = Course::find($id);

      return view('course.edit', compact('course'));
    }
}
