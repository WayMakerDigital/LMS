@extends('master')

@section('content')

	<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Categories</h3>
					  @if (session('info'))
                         <div class="alert alert-success">
                         {{ session('info')}}
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
								@if(!count($categories))
									 <p>There are no blog categories yet</p>
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
												<form action="{{route('destroy.category', $category->id)}}" method="POST">
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