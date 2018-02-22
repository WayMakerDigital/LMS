@extends('master') 

@section('content')


<div class="main-content">
    <div class="container-fluid">

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{route('update.topic', $topic->id)}}">
                {{csrf_field()}} @method('PUT') 
                @if (session('success'))
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                               <span aria-hidden="true">&times;</span>
      </button>
                            <strong>{{ session('success')}}</strong>
                        </div>
                    </div>

                </div>
                @endif
                <div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Selected Module</label>
                    <select name="module" class="custom-class" id="status">
                 @if($modules->count())
                  @foreach($modules as $module)
                    <option value="{{$module->id}}" {{$topic->module_id == $module->id ? 'selected="selected"': ''}}>{{$module->title}}</option>
                    @endforeach
                    @endif
                </select> @if ($errors->has('module'))
                    <span class="help-block">{{ $errors->first('module') }}</span> @endif
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Topic Title</label>
                    <input type="text" name="title" class="form-control" id="name" value="{{$topic->title}}"> @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span> @endif
                </div>

                <div class="form-group{{ $errors->has('topic_rank') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Selected Position for the Topic</label>
                    <select name="topic_rank" class="custom-class" id="status">
                @foreach($rank_numbers as $rank_number)
             <option value="{{$rank_number}}" {{$rank_number == $topic->rank ? 'selected="selected"': ''}}>{{$rank_number}}</option>
                    @endforeach
                </select>
                    </select>
                    @if ($errors->has('topic_rank'))
                    <span class="help-block">{{ $errors->first('topic_rank') }}</span> @endif
                </div>


                <div class="form-group{{ $errors->has('vimeo_url') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Video associated with this Topic</label>
                    <select name="vimeo_url" class="custom-class">
                    @foreach($videos['body']['data'] as $video)
                 <option value="{{$video['link']}}" {{$video['link'] == $topic->vimeo_url ? 'selected="selected"': ''}}>{{$video['name']}}</option>
                    @endforeach
                  </select> @if ($errors->has('vimeo_url'))
                    <span class="help-block">{{ $errors->first('vimeo_url') }}</span> @endif
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