@extends('master') 
@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{route('update.question', $question->id)}}">
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
            
                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                    <label for="question" class="control-label">Question</label>
                    <textarea name="question" class="form-control" id="question">{{$question->question}}</textarea> 
                    @if ($errors->has('question'))
                    <span class="help-block">{{ $errors->first('question') }}</span> 
                    @endif
                </div>

            <div class="form-group{{ $errors->has('score') ? ' has-error' : '' }}">
             <label for="score" class="control-label">Score</label>
                    <input type="number" name="score" class="form-control" value="{{$question->score}}" id="number">
                    @if ($errors->has('score'))
                    <span class="help-block">{{ $errors->first('score') }}</span> 
                    @endif
            </div>
   

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('question');
    </script>

    @endsection