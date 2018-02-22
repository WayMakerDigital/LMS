@extends('master')

@section('content')

	<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Modules</h3>
					  @if (session('info'))
                         <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
                            <strong>{{ session('info')}}</strong>
                        </div>
                    </div>

                </div>
                           @endif
					<div class="row">
						<div class="col-md-6">
							<!-- BASIC TABLE -->
				            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
								@if(!count($modules))
								<p> There are no modules yet </p>
								@else
									<table class="table table-bordered">
										<thead>
										<tr>
												<th>Module Title</th>
												<th>Course</th>
												<th>Position </th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
									  @foreach($modules as $module)
										<tbody>
											<tr>
												<td>{{$module->title}}</td>
												<td>{{$module->course->title}}</td>
												<td>{{$module->rank}}</td>
											<form action="{{route('edit.module', $module->id)}}" method="GET">
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-success btn-xs" ><span class="fa fa-pencil fa-fw"></span></button></p></td>
  </form>
												
												<form action="{{route('destroy.module', $module->id)}}" method="POST">
      {{csrf_field()}}
      {{method_field('DELETE')}}
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" ><span class="fa fa-fw fa-trash"></span></button></p></td>
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