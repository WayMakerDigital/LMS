<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Topic;
use App\Module;
use App\Http\Controllers\Controller;
use Vimeo;

class TopicController extends Controller
{

	 public function create()
    {

      $modules = Module::all();

      $rank_numbers = range(1, 13);

      $videos = Vimeo::request('/me/videos', ['per_page' =>30], 'GET');
     // $i_count = count($videos['body']['data']);
    
    /*  foreach($videos as $video){
       dd($video['data'][0]['name']);
      }
      */
  
      return view('topic.new', compact('rank_numbers', 'modules', 'videos'));
    }

    public function index()
    {
    	$topics = Topic::all();

    	return view('topic.index', compact('topics'));
    }

    public function store(Request $request)
    {
     
       $this->validate($request, [
        'title' => 'required|min:3',
        'description' =>'|min:5',
        'topic_rank' => 'required',
         'module'=>'required',
         'vimeo_url'=>'required',
    	]);
  
    $title = $request->title;
    $slug = str_slug($title, '-');

    $topic = new Topic;

    $topic->title = $title;
    $topic->module_id = $request->module; 
    $topic->slug = $slug;
    $topic->rank = $request->topic_rank;
    $topic->vimeo_url = $request->vimeo_url;
    $topic->save();
   

   return redirect()->back()->with('success', 'New Topic has been created succesfully');
    }

    public function edit($id)
    {
      $topic= Topic::find($id);

      $modules = Module::all();

      $rank_numbers = range(1, 13);

       $videos = Vimeo::request('/me/videos', ['per_page' =>30], 'GET');

      return view('topic.edit', compact('topic', 'modules', 'rank_numbers', 'videos'));
    }

    public function update(Request $request, $id)
    {
    $this->validate($request, [
        'title' => 'required|min:3',
         'topic_rank' => 'required',
         'module'=>'required',
         'vimeo_url'=> 'required',
    	]);

      $title = $request->title;
      $update_slug = str_slug($title, '-');

    $topic = Topic::find($id);

    $topic->title = $title;
    $topic->module_id = $request->module; 
    $topic->slug = $update_slug;
    $topic->vimeo_url = $request->vimeo_url;
    $topic->rank = $request->topic_rank;

    $topic->save();
//  dd($topic);
   
   return redirect()->back()->with('success', 'Topic has been updated succesfully');
    }

    public function delete($id)
    {
    	$topic = Topic::find($id);
    	$topic->delete();

    	return redirect()->back()->with('info', 'Topic has been deleted successfully');
    }
   
   public function vimeo()
   {
   	$vimeo = Vimeo::request('/me/videos', ['per_page' =>30], 'GET');

   	dd($vimeo);
   }
}
