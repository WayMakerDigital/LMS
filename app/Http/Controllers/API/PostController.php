<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
   public function getAllPosts()
   {
       $post = Post::all();

       return response()->json(['data'=>$post, 'status_code'=>200]);

   }

   public function getPost($slug)
   {
       $post = Post::whereSlug($slug)->firstorFail();

       $post_category = Post::find($post->id)->category->title; 

       return response()->json(['data'=>$post, 'post_category'=>$post_category, 'status_code'=>200]);

   }
}
