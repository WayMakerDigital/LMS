@extends('master') 


@section('content')


<div class="main-content">
    <div class="container-fluid">

        <div class="col-lg-6">
            <form class="form-vertical" role="form" enctype="multipart/form-data" method="post" action="{{route('upload.course.category')}}">
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
                    <input type="text" name="title" class="form-control" id="name" value=""> @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span> @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
            </form>
        </div>
    </div>

    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Course Categories</h3>
            <div class="row">
                <div class="col-md-6">
                    <!-- BASIC TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="panel-body">
                            @if(!count($categories))
                            <p>There are no course categories yet</p>
                            @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                @foreach($categories as $category)
                                <tbody>
                                    <tr>
                                        <td>{{$category->title}}</td>
                                        <form action="{{route('destroy.course.category', $category->id)}}" method="POST">
                                            {{csrf_field()}} 
                                            {{method_field('DELETE')}}
                                            <td>
                                                <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"><span class="fa fa-fw fa-trash"></span></button></p>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                                @endforeach 
                                @endif
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE -->
                </div>




 @endsection