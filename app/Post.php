<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function categories()
    {
       return $this->belongsToMany('App\PostCategory','post_pivot_categories', 'post_id', 'post_category_id');
    }
}
