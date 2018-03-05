<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PostController extends Controller
{


      public function index()
	{
		$posts = Post::all();

		return view('post.index', compact('posts'));
	}

	public function edit($id)
	{
       $post = Post::find($id);

		$categories = PostCategory::all();
		

		return view('post.edit', compact('post', 'categories'));
	}
    public function create()
    {
     
   $categories = PostCategory::all();

 //  dd($categories);

	return view('post.new', compact('categories'));
    }

       public function store(Request $request)
    {
    	$this->validate($request, [ 
         'title'=> 'required|min:4',
         'content'=> 'required|min:4',
         'cover_image'=> 'required|image',
         'category'=>'required'
      
       ]);
      $title = $request->title;
      $slug = str_slug($title);
      $content = $request->content;
      $category_id = $request->category;
      $test = $request->file('cover_image')->getClientOriginalName();
      $path = $request->file('cover_image')->storeAs('public', $test);
      $tests= storage::url($test);
     
      $post = new Post; 

      $post->title = $title;
      $post->body_content = $content;
      $post->slug = $slug;
      $post->image_name = $test;
      $post->image_url= $tests;
      $post->category_id = $category_id;

      $post->save();

      return redirect()->back()->with('success', 'New post has been created succesfully');

  }

  public function update(Request $request, $id)
    {

    $this->validate($request, [ 
         'title'=> 'required|min:4',
         'description'=> 'required|min:4',
         'content'=> 'required|min:4',
         'blog_image'=>'required|image'
       ]);

     $title = $request->title;
     $update_slug = str_slug($title);

    if($request->has('blog_image')){
    $cover_image = $request->blog_image->getClientOriginalName();
    $cover_path = $request->blog_image->storeAs('public', $cover_image);
    $cover_url =  Storage::url($cover_image);
} else {
    $cover_image = $request->image_name;
    $cover_url = Storage::url($cover_image);
}
         
     $post = Post::find($id);

    	$post->title = $title;
    	$post->body_content = $request->content;
      $post->image_name = $cover_image;
      $post->image_url= $cover_url;
      $post->slug = $update_slug;
    	$post->category_id = $request->category;

      $post->save();


     return redirect()->back()->with('success', 'Post has been updated succesfully');

    }

    public function destroy($slug)
    {
     
      $post = Post::whereSlug($slug)->firstorFail();
      $post->delete();

      return redirect()->back()->with('info', 'Post has been deleted successfully');


    }
}
