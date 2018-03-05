@extends('master')

@section('content')


<div class="main-content">
<div class="container-fluid">

	<div class="col-lg-6">
             @if(!count($courses))
                <p> You'll need to create a course before you can create a module </p>
                @else
		<form class="form-vertical" role="form" method="post"  action="{{route('upload.module')}}">
		 {{csrf_field()}}
		  @if (session('success'))
                        <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">  <span aria-hidden="true">&times;</span>
      </button>
                            <strong>{{ session('success')}}</strong>
                        </div>
                   @endif
             <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Please select a Course</label>

                <select name="course" class="custom-class" id="status">
                  @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->title}}</option>
                    @endforeach
                </select>
                @if ($errors->has('course'))
                    <span class="help-block">{{ $errors->first('course') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Module Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{ old('title')}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="body_text" class="control-label">Module Description</label>
                <textarea name="description" class="form-control" id="body_text">{{ old('description')}}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('module_rank') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Please select a Position for the Module</label>
                <select name="module_rank" class="custom-class" id="status">
                @foreach($rank_numbers as $rank_number)
                 <option value="{{$rank_number}}">{{$rank_number}}</option>
                    @endforeach
                </select>
                 </select>
                  @if ($errors->has('module_rank'))
                    <span class="help-block">{{ $errors->first('module_rank') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Create</button>
            </div>

        </form>
           @endif
    </div>
</div>

<script>
CKEDITOR.replace('body_text');
</script>


@endsection

