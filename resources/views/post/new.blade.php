@extends('master') 
@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="col-lg-6">
            <form class="form-vertical" enctype="multipart/form-data" role="form" method="post" action="{{route('upload.post')}}">
                {{csrf_field()}} 
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" name="title" class="form-control" id="name" value="{{old('title')}}"> @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span> @endif
                </div>
            
                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content" class="control-label">Content</label>
                    <textarea name="content" class="form-control" id="content">{{old('content')}}</textarea> @if ($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content') }}</span> @endif
                </div>
                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Choose Blog Category</label>
                    <select name="category" id="status">
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select> 
                @if ($errors->has('category'))
                    <span class="help-block">{{ $errors->first('category') }}</span>
                 @endif
                </div>

                <div class="form-group{{ $errors->has('cover_image') ? ' has-error' : '' }}">
                    <label for="cover_image" class="control-label">Choose Blog Image</label>
                    <input type="file" name="cover_image" class="form-control" id="name"> @if($errors->has('cover_image'))
                    <span class="help-block">{{ $errors->first('cover_image') }}</span> @endif
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