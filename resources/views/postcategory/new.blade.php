@extends('master')

@section('content')


<div class="main-content">
<div class="container-fluid">

	<div class="col-lg-6">
		<form class="form-vertical" role="form" enctype="multipart/form-data" method="post"  action="{{route('upload.post.category')}}">
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
                <label for="name" class="control-label">Name of Category</label>
                <input type="text" name="title" class="form-control" id="name" value="">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
</div>




@endsection

