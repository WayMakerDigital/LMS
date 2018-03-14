@extends('master')

@section('content')

<div class="main-content">
<div class="container-fluid">

    <div class="col-lg-6">
        <form class="form-vertical" enctype="multipart/form-data" role="form" method="post"  action="{{route('update.post', $post->id)}}">
         {{csrf_field()}}
         {{method_field('PUT')}}
          @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
                    <strong>{{ session('success')}}</strong>
                </div>
                @endif  
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="control-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{$post->title}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
               <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <label for="content"  class="control-label">Content</label>
                <textarea name="content" class="form-control" id="content" >{{$post->body_content}}</textarea>
                @if ($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Choose Blog Category</label>
                <select name="category" id="status">
                  @if($categories->count())
                  @foreach($categories as $category)
                  @foreach($post->categories as $post_category)
                <option value="{{$category->id}}" {{$post_category->pivot->post_category_id == $category->id ? 'selected="selected"' : ''}}>{{ $category->title}}</option>
                  @endforeach  
                  @endforeach
                    @endif
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">{{ $errors->first('category') }}</span>
                @endif
            </div>
           
     <div class="fileinput fileinput-new" data-provides="fileinput">
     <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
      <img src="{{asset($post->image_url)}}" alt="...">
      </div>
  
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-success btn-file"><span class="fileinput-new">Select new image</span><span class="fileinput-exists">Change</span><input type="hidden" name="image_name" value="{{$post->image_name}}"><input type="file" name="blog_image"></span>
    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
         @if ($errors->has('blog_image'))
                    <span class="help-block">{{ $errors->first('blog_image') }}</span>
     @endif
  </div>
</div>

             
            <div class="form-group">
                <button type="submit" class="btn btn-default">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
CKEDITOR.replace('content');
</script>

@endsection