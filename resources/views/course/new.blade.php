@extends('master')

@section('content')


<div class="main-content">
<div class="container-fluid">
                

	<div class="col-lg-6">
		<form class="form-vertical" role="form" enctype="multipart/form-data" method="post"  action="{{route('upload.course')}}">
		 {{csrf_field()}}
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
                <input type="text" name="title" class="form-control" id="name" value="{{ old('title')}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="body_text" class="control-label">Description</label>
                <textarea name="description" class="form-control" id="body_text">{{ old('description')}}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>

              <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Choose Course Category</label>
                <select name="category" id="status">
                   <p>You are yet to create a category</p>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">{{ $errors->first('category') }}</span>
                @endif
            </div>
    
                 <div class="form-group{{ $errors->has('vimeo_url') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Please select the Preview Video for this course</label>
                 <select name="vimeo_url" class="custom-class">
                    @foreach($videos['body']['data'] as $video)
                 <option value="{{$video['link']}}">{{$video['name']}}</option>
                    @endforeach
                  </select>               
    
                  @if ($errors->has('vimeo_url'))
                    <span class="help-block">{{ $errors->first('vimeo_url') }}</span>
                @endif
            </div>


            <div class="form-group{{ $errors->has('course_price') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Course Price</label>
                <input type="number" name="course_price" class="form-control" id="name" value="{{ old('course_price')}}">
                @if ($errors->has('course_price'))
                    <span class="help-block">{{ $errors->first('course_price') }}</span>
                @endif
            </div>
            
             <?php $date = Carbon\Carbon::now(); ?>
                <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                <label for="date" class="control-label"> Start Date</label>
                <input type="date" name="start_date" class="form-control" id="due-date" value="<?php echo $date->format('Y-m-d');?>">
                @if ($errors->has('start_date'))
                    <span class="help-block">{{ $errors->first('start_date') }}</span>
                @endif
            </div>   

               <div class="custom-group{{ $errors->has('course_image') ? ' has-error' : '' }}">
                 <label for="cover_image" class="control-label">Course Image</label>
                            <input type="file" name="course_image" class="form-control">
                            @if($errors->has('course_image'))
                                <span class="help-block">{{ $errors->first('course_image') }}</span>
                            @endif
                        </div>

               <div class="form-check">
                <input type="checkbox" name="publish_course" class="form-check-input" value="1">
                  <label for="name" class="form-check-label">Publish course</label>
            </div>
             
            <div class="form-check">
                <input type="checkbox" name="free_course" class="form-check-input" value="1">
                  <label for="name" class="form-check-label">Free course</label>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-default">Create</button>
            </div>

        </form>
    </div>
</div>

<script>
CKEDITOR.replace('body_text');
</script>


@endsection

