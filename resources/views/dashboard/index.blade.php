@extends('master')

@section('content')

<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-sticky-note"></i></span>
										<p>
											<span class="number">{{$users}}</span>
											<span class="title">Users</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{$admins}}</span>
											<span class="title">Administrators</span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								</div>
							</div>
						</div>
					</div>

	@endsection