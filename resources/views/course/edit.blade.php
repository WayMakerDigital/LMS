@extends('master')

@section('content')


<div class="col-lg-6">
    <form class="form-vertical" role="form" enctype="multipart/form-data" method="post"  action="{{route('update.course', $course->id)}}">
     {{csrf_field()}}
     @method('PUT')
     @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
                    <strong>{{ session('success')}}</strong>
                </div>
         @endif
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{$course->title}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="body_text" class="control-label">Description</label>
                <textarea name="description" class="form-control" id="body_text">{{$course->description}}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                <label for="category" class="control-label">CourseCategory</label>
                <select name="category" id="status">
                  @if(count($categories) > 0)
                  @foreach($categories as $category)
                <option value="{{$category->id}}" {{$course->category_id == $category->id ? 'selected="selected"' : ''}}>{{$category->title}}</option>
                    @endforeach
                    @endif
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">{{ $errors->first('category') }}</span>
                @endif
            </div>

                <div class="form-group{{ $errors->has('vimeo_url') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Video associated with this Topic</label>
                    <select name="vimeo_url" class="custom-class">
                    @foreach($videos['body']['data'] as $video)
                 <option value="{{$video['link']}}" {{$video['link'] == $course->preview_url ? 'selected="selected"': ''}}>{{$video['name']}}</option>
                    @endforeach
                  </select> @if ($errors->has('vimeo_url'))
                    <span class="help-block">{{ $errors->first('vimeo_url') }}</span> @endif
                </div>


            <div class="form-group{{ $errors->has('course_price') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Course Price</label>
                <input type="number" name="course_price" class="form-control" id="name" value="{{$course->price}}">
                @if ($errors->has('course_price'))
                    <span class="help-block">{{ $errors->first('course_price') }}</span>
                @endif
            </div>
            
                <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}"> 
                <label for="date" class="control-label"> Start Date</label>
                <input type="date" name="start_date" class="form-control" id="due-date" value="{{$course->start_date->format('Y-m-d')}}">
                @if ($errors->has('start_date'))
                    <span class="help-block">{{ $errors->first('start_date') }}</span>
                @endif
            </div>

              
            <div class="fileinput fileinput-new" data-provides="fileinput">
           <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
          <img src="{{asset($course->image_url)}}" alt="...">
           </div>
  
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-success btn-file"><span class="fileinput-new">Select new image</span><span class="fileinput-exists">Change</span><input type="hidden" name="image_name" value="{{$course->image_name}}"><input type="file" name="course_image"></span>
    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
         @if ($errors->has('course_image'))
                    <span class="help-block">{{ $errors->first('course_image') }}</span>
     @endif
  </div>
</div>

          
               <div class="form-check">
                <input type="checkbox" name="publish_course" class="form-check-input" value="1" <?php if($course->published === 1) echo 'checked="checked"';?> />
                  <label for="name" class="form-check-label">Publish course</label>
            </div>
    
            <div class="form-check">
                <input type="checkbox" name="free_course" class="form-check-input" value="1" <?php if($course->free_course === 1) echo 'checked="checked"';?> />
                  <label for="name" class="form-check-label">Free course</label>
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

