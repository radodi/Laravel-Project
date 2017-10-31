@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				LECTURES <small>&raquo; Add New Lecture</small>
			</h3>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Lecture Form
					</h3>
				</div>
				@if($errors->any())
				<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				@endif	
				</ul>
				</div>
				<div class="panel-body">					
					<form action="{{ route('lecture.store')}}" role="form" method="POST" class="form-horizontal">
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
									<label for="start_date" class="col-md-2 control-label">
										Start date
									</label>
									<div class="col-md-10">
										<input type="data" name="start_date"  class="form-control" id="start_date" value="{{ old('start_date') }}">
									</div>
								</div>
								<div class="form-group">
									<label for="end_date" class="col-md-2 control-label">
										End date
									</label>
									<div class="col-md-10">
										<input type="data" name="end_date"  class="form-control" id="end_date" value="{{ old('end_date') }}">
									</div>
								</div>
								<div class="form-group">
									<label for="homework" class="col-md-2 control-label">
										Homework
									</label>
									<div class="col-md-10">
										<textarea name="hasHomework" id="hasHomework" value="{{ old('hasHomework') }}"></textarea>
									</div>
								</div>	
								<div class="form-group">
									<label for="cuorse_id" class="col-md-2 control-label">
										 Course          
									</label>
									<div class="col-md-10">
										<input type="text"  class="form-control" name="course_id" id="course_id" value= "{{ old('course_id') }}">
									</div>
								</div>					
								<div class="col-md-8">
									<div class="form-group">
										<div class="col-md-10 col-md-offset-2">
											<button type="submit" class="btn btn-primary btn-lg">
												<i class="fa fa-disk-o">													
												</i>
												Save New lecture
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

