@extends('master')

@section('content')


<div class="main-content">
<div class="container-fluid">

  <div class="col-lg-6">
    <form class="form-vertical" role="form" method="post"  action="{{route('update.module', $module->id)}}">
     {{csrf_field()}}
     @method('PUT')
      @if (session('success'))                                      
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                   @endif
             <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Selected Course</label>
                <select name="course" class="custom-class" id="status">
                 @if($courses->count())
                  @foreach($courses as $course)
                    <option value="{{$course->id}}" {{$module->course_id == $course->id ? 'selected="selected"': ''}}>{{$course->title}}</option>
                    @endforeach
                    @endif
                </select>
                @if ($errors->has('course'))
                    <span class="help-block">{{ $errors->first('course') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Module Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{$module->title}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="body_text" class="control-label">Module Description</label>
                <textarea name="description" class="form-control" id="body_text">{{$module->description}}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('module_rank') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Selected Position for the Module</label>
                <select name="module_rank" class="custom-class" id="status">
                @foreach($rank_numbers as $rank_number)
             <option value="{{$rank_number}}" {{$rank_number == $module->rank ? 'selected="selected"': ''}}>{{$rank_number}}</option>
                    @endforeach
                </select>
                 </select>
                  @if ($errors->has('module_rank'))
                    <span class="help-block">{{ $errors->first('module_rank') }}</span>
                @endif
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

