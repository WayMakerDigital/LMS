<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function getAllPaidCourses()
    {
     $paid_courses = Course::published()->paid()->orderBy('start_date')->get();

     return response()->json(['data'=>$paid_courses, 'status_code'=>200]);
    }
  
   public function getAllFreeCourses()
    {
    $free_courses = Course::published()->free()->orderBy('start_date')->get();
    
    return response()->json(['data'=>$free_courses, 'status_code'=>200]);
  }

  public function getCourse($slug)
  {
  	$course = Course::whereSlug($slug)->firstorFail();

  	return response()->json(['data'=>$course, 'status_code'=>200]);
  }
}
