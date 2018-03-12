<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;
use App\Course;
use App\CourseCategory;
use Illuminate\Support\Facades\Storage;
use Vimeo;

class CourseController extends Controller
{
    public function create()
    { 
      

      $categories = CourseCategory::all();

      $videos = Vimeo::request('/me/videos', ['per_page' =>30], 'GET');

      //dd($videos);

      return view('course.new', compact('categories','videos'));
    }

    public function index()
    {
        $courses = Course::all();

        $categories = CourseCategory::all();

    	return view('course.index', compact('courses'));
    }

    public function store(CourseRequest $request)
    {
         $this->validate($request, [
        'title' => 'required|min:3',
        'description' =>'required|min:5',
        'course_price' =>'required',
        'course_image' =>'required|image',
    	]);
     

    $title = $request->title;
    $slug = str_slug($title, '-');
    $image_name = $request->file('course_image')->getClientOriginalName();
    $path = $request->file('course_image')->storeAs('public', $image_name);
    $image_url= Storage::url($image_name);
    $category_id = $request->category;

        $course = new Course;

    if($request->publish_course == 1){
    	$publish_course = 1;
    	$course->published = $publish_course;
    }
     if($request->free_course == 1){
    	$free_course = 1;
    	$course->free_course = $free_course;
    }

       $course->title = $title;
       $course->description = $request->description;
       $course->slug = $slug;
       $course->price = $request->course_price;
       $course->start_date = $request->start_date;
       $course->image_name = $image_name;
       $course->image_url = $image_url;
       $course->preview_url = $request->vimeo_url;

       $course->save();

       $course->categories()->attach($category_id);


       return redirect()->back()->with('success', 'New Course has been created succesfully');
    }

    public function edit($id)
    {
      $course = Course::find($id);

      $categories = CourseCategory::all();

      $videos = Vimeo::request('/me/videos', ['per_page' =>30], 'GET');

      return view('course.edit', compact('course', 'categories', 'videos'));
    }

    public function update(Request $request, $id)
    {
    $this->validate($request, [
        'title' => 'required|min:3',
        'description' =>'required|min:5',
        'course_price' =>'required',
    	]);

     $title = $request->title;
     $description = $request->description;
     $update_slug = str_slug($title, '-');
     $category_id = $request->category;

    if($request->has('course_image')){
    $cover_image = $request->course_image->getClientOriginalName();
    $cover_path = $request->course_image->storeAs('public', $cover_image);
    $cover_url =  Storage::url($cover_image);
} else {
    $cover_image = $request->image_name;
    $cover_url = Storage::url($cover_image);
}
        
       
        $course = Course::find($id);

    if($request->publish_course == 1){
    	$publish_course = 1;
    	$course->published = $publish_course;
    }else{
    	$course->published = 0;
    }
     if($request->free_course == 1){
    	$free_course = 1;
    	$course->free_course = $free_course;
    }else{
    	$course->free_course = 0;
    }

       $course->title = $title;
       $course->description = $description;
       $course->slug = $update_slug;
       $course->price = $request->course_price;
       $course->start_date = $request->start_date;
       $course->image_name = $cover_image;
       $course->image_url = $cover_url;
       $course->preview_url = $request->vimeo_url;

       $course->save();

       $course->categories()->sync([$category_id]);
   

       return redirect()->back()->with('success', 'Course has been updated succesfully');
    }

    public function delete($id)
    {
        $course = Course::find($id);
        $course->categories()->detach();
    	$course->delete();

    	return redirect()->back()->with('info', 'Course has been deleted successfully');
    }
}
