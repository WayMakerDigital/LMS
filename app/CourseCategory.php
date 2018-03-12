<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseCategory extends Model
{
    public function courses()
    {
      return $this->belongsToMany('App\Course','course_pivot_categories', 'course_category_id', 'course_id');
    }
}
