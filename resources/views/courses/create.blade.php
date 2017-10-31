@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				COURSE <small>&raquo; Add New Course</small>
			</h3>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Courses Form
					</h3>
				</div>
				<div class="panel-body">					
					<form action="{{ route('course.store')}}" role="form" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="name" class="col-md-2 control-label">
										 Name           
									</label>
									<div class="col-md-10">
										<input type="text"  class="form-control" name="name" id="name" value= "{{ old('name') }}">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-md-2 control-label">
										Duration
									</label>
									<div class="col-md-10">
										<input type="text" name="duration"  class="form-control" id="duration" value="{{ old('duration') }}">
									</div>
								</div>
								<div class="form-group">
									<label for="bio" class="col-md-2 control-label">
										Description
									</label>
									<div class="col-md-10">
										<textarea name="description" id="description" value="{{ old('description') }}"></textarea>
									</div>
								</div>						
								<div class="col-md-8">
									<div class="form-group">
										<div class="col-md-10 col-md-offset-2">
											<button type="submit" class="btn btn-primary btn-lg">
												<i class="fa fa-disk-o">													
												</i>
												Save New Course
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

