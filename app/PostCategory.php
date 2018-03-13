<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PostCategory extends Model
{
   public function posts()
    {
      return $this->belongsToMany('App\PostCategory','post_pivot_categories', 'post_category_id', 'post_id');
    }
}
