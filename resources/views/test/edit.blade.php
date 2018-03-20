@extends('master')

@section('content')

<div class="main-content">
<div class="container-fluid">

    <div class="col-lg-6">
        <form class="form-vertical" enctype="multipart/form-data" role="form" method="post"  action="{{route('update.test', $test->id)}}">
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
                <input type="text" name="title" class="form-control" id="name" value="{{$test->title}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
        
            <div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
                <label for="module" class="control-label">Choose Blog Category</label>
                <select name="module" id="status">
                  @if($modules->count())
                  @foreach($modules as $module)
                   <option value="{{$module->id}}" {{$test->module_id == $module->id ? 'selected="selected"' : ''}}>{{ $module->title}}</option>  
                  @endforeach
                    @endif
                </select>
                @if ($errors->has('module'))
                    <span class="help-block">{{ $errors->first('module') }}</span>
                @endif
            </div>

                <div class="form-group{{ $errors->has('questions') ? ' has-error' : '' }}">
                 <label for="questions" class="control-label">Questions that belongs to this test</label>
                <select class="selectpicker" name="questions[]" multiple>
                @foreach($questions as $question)
                <option value="{{$question->id}}" @foreach($test->questions as $test_question) {{$test_question->pivot->question_id == $question->id ? 'selected="selected"' : ''}}@endforeach>{!! $question->question !!}</option>
                @endforeach
                </select>
                  @if ($errors->has('questions'))
                    <span class="help-block">{{ $errors->first('questions') }}</span>
                 @endif
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