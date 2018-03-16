@extends('master') 
@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{route('upload.question')}}">
                {{csrf_field()}} 
               @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
                    <strong>{{ session('success')}}</strong>
                </div>
                @endif             
            
                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                    <label for="question" class="control-label">Question</label>
                    <textarea name="question" class="form-control" id="question">{{old('question')}}</textarea> 
                    @if ($errors->has('question'))
                    <span class="help-block">{{ $errors->first('question') }}</span> 
                    @endif
                </div>

            <div class="form-group{{ $errors->has('score') ? ' has-error' : '' }}">
             <label for="score" class="control-label">Score</label>
                    <input type="number" name="score" class="form-control" value="{{old('score', 1)}}" id="number">
                    @if ($errors->has('score'))
                    <span class="help-block">{{ $errors->first('score') }}</span> 
                    @endif
            </div>
   
               @for($question=1; $question<=4; $question++)
               <div class="form-group{{ $errors->has('option_text') ? ' has-error' : '' }}">
             <label for="score" class="control-label">Option {{$question}}</label>
               <input type="text" name="option_text_{{$question}}" class="form-control" value="{{old('option_text')}}">
                    @if ($errors->has('option_text'))
                    <span class="help-block">{{ $errors->first('option_text') }}</span> 
                    @endif

               <div class="form-group">
                  <input type="checkbox" name="correct_{{$question}}" class="form-check-input" value="1">
                     <label for="correct" class="form-check-label">Correct</label>
               </div>

            </div>
            @endfor



                <div class="form-group">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('question');
    </script>

    @endsection