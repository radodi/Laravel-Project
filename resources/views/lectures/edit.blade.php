@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				Lecture <small>&raquo; Add New lecture</small>
			</h3>

		</div>
	</div>
	@if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Lecture Form
					</h3>
				</div>
				<div class="panel-body">					
					<form action="{{ route('lecture.update', $lecture->id)}}" role="form" method="POST" class="form-horizontal">
					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="PUT">
						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="name" class="col-md-2 control-label">
										 Name           
									</label>
									<div class="col-md-10">
										<input type="text"  class="form-control" name="name" id="name" value= "{{ $lecture->name }}">
									</div>
								</div>
								<div class="form-group">
									<label for="start_date" class="col-md-2 control-label">
										Start date 
									</label>
									<div class="col-md-10">
										<input type="text" name="start_date"  class="form-control" id="start_date" value="{{ $lecture->start_date }}">
									</div>
								</div>
								<div class="form-group">
									<label for="end_date" class="col-md-2 control-label">
										End date 
									</label>
									<div class="col-md-10">
										<input type="text" name="end_date"  class="form-control" id="end_date" value="{{ $lecture->end_date }}">
									</div>
								</div>
								<div class="form-group">
									<label for="homework" class="col-md-2 control-label">
										Homework
									</label>
									<div class="col-md-10">
										<textarea name="hasHomework" id="hasHomework" >{{ $lecture->hasHomework }}</textarea>
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
												Save New Lecture
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

