@extends('master')

@section('content')


<div class="main-content">
<div class="container-fluid">

	<div class="col-lg-6">
		<form class="form-vertical" role="form" enctype="multipart/form-data" method="post"  action="{{route('update.post', $post->id)}}">
		 {{csrf_field()}}
         {{method_field('PUT')}}
		  @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                   @endif
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{$post->title}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('body_text') ? ' has-error' : '' }}">
                <label for="body_text" class="control-label">Content</label>
                <textarea name="body_text" class="form-control" id="body_text">{!! $post->body_text !!}</textarea>
                @if ($errors->has('body_text'))
                    <span class="help-block">{{ $errors->first('body_text') }}</span>
                @endif
            </div>

                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="date" class="control-label"> Date</label>
                <input type="date" name="date" class="form-control" id="due-date" value="{{$post->date->format('Y-m-d')}}">
                @if ($errors->has('date'))
                    <span class="help-block">{{ $errors->first('date') }}</span>
                @endif
            </div>

            <div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
    <img src="{{asset($post->image_url)}}" alt="...">
  </div>
  
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-success btn-file"><span class="fileinput-new">Select new image</span><span class="fileinput-exists">Change</span><input type="hidden" name="image_name" value="{{$post->image_name}}"><input type="file" name="cover_image"></span>
    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
         @if ($errors->has('cover_file'))
                    <span class="help-block">{{ $errors->first('cover_file') }}</span>
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
CKEDITOR.replace('body_text');
</script>


@endsection

