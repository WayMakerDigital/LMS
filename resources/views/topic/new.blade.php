@extends('master')

@section('content')


<div class="main-content">
<div class="container-fluid">

	<div class="col-lg-6">
      @if(!count($modules))
                <p> You'll need to create a Module before you can create a Topic </p>
                @else
		<form class="form-vertical" role="form" method="post"  action="{{route('upload.topic')}}">
		 {{csrf_field()}}
		     @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
                            <strong>{{ session('success')}}</strong>
                        </div>
                   @endif
             <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Please select a Module</label>

                <select name="module" class="custom-class" id="status">
                  @foreach($modules as $module)
                    <option value="{{$module->id}}">{{$module->title}}</option>
                    @endforeach
                </select>

                @if ($errors->has('course'))
                    <span class="help-block">{{ $errors->first('course') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{ old('title')}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('topic_rank') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Please select a Position for the Topic</label>
                <select name="topic_rank" class="custom-class">
                @foreach($rank_numbers as $rank_number)
                 <option value="{{$rank_number}}">{{$rank_number}}</option>
                    @endforeach
                 </select>
                  @if ($errors->has('topic_rank'))
                    <span class="help-block">{{ $errors->first('topic_rank') }}</span>
                @endif
            </div>   
                         

            <div class="form-group{{ $errors->has('vimeo_url') ? ' has-error' : '' }}">
                <label for="category" class="control-label">Please select the Video associated with this Topic</label>
                 <select name="vimeo_url" class="custom-class">
                    @foreach($videos['body']['data'] as $video)
                 <option value="{{$video['link']}}">{{$video['name']}}</option>
                    @endforeach
                  </select>               
    
                  @if ($errors->has('vimeo_url'))
                    <span class="help-block">{{ $errors->first('vimeo_url') }}</span>
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

