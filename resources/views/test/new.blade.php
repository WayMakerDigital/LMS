@extends('master') 
@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{route('upload.post')}}">
                {{csrf_field()}} 
               @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
                    <strong>{{ session('success')}}</strong>
                </div>
                @endif                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Test Title</label>
                    <input type="text" name="title" class="form-control" id="name" value="{{old('title')}}"> 
                    @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span> 
                    @endif
                </div>
            
                <div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Select a module to assign the test to</label>
                    <select name="module" id="status">
                  @foreach($modules as $module)
                    <option value="{{$module->id}}">{{$module->title}}</option>
                    @endforeach
                </select> 
                @if ($errors->has('module'))
                    <span class="help-block">{{ $errors->first('module') }}</span>
                 @endif
                </div>

                <div class="form-group{{ $errors->has('questions') ? ' has-error' : '' }}">
                 <label for="questions" class="control-label">Select the questions that belongs to this test</label>
                <select class="selectpicker" name="questions" multiple>
                @foreach($questions as $question)
                <option value={{$question->id}}>{!! $question->question !!}</option>
                @endforeach
                </select>
                  @if ($errors->has('questions'))
                    <span class="help-block">{{ $errors->first('questions') }}</span>
                 @endif
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('content');
    </script>

    @endsection