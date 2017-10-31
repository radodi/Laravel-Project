@extends('layouts.master')

@section('title', 'Lectures')

@section('style')
<link rel="stylesheet" type="text/css" href="">
@endsection

 @section('content')
<div class="container">
<div class="row">
	<div class="col-md-6">
	<h1>LECTURES</h1>
</div>	
</div>
		@if ($message = Session::get('success'))

        	<div class="alert alert-success">

           		 <p>{{ $message }}</p>

        	</div>

   		 @endif
@foreach($courses as $course)
	{{ $course->name }}
	

	
<div class="row">
<table class="table">
	<tr>
		<td>
			lecture Name
		</td>
		<td>
			lecture start
		</td>
		<td>
			lecture end
		</td>
		<td>
			Homework
		</td>
		<td>
			Edit Lecture
		</td>
		<td>
			Delete lecture
		</td>
	</tr>
	@foreach($course->lectures as $lecture)
	<tr>
		<td>
			<a href="{{ route('lecture.show', $lecture->id)}}">
				{{ $lecture->name }}				
			</a>			
		</td>
		<td>
			{{ $lecture->start_date }}
		</td>
		<td>
			{{ $lecture->end_date }}
		</td>
		<td>
			{{ $lecture->hasHomework }}
		</td>
		<td>
			<a href="{{ route('edit_lecture_info', $lecture->id) }}" class="btn btn-info">Edit</a>
		</td>
		<td>
			{!! Form::open(['method' => 'DELETE','route' => ['lecture.destroy', $lecture->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

		</td>
	</tr>
@endforeach
</table>
@endforeach
<div class="row">
	<div class="col-md-6">
		<a href="{{ route('add_new_lecture') }}" class="btn btn-info">Add New Lecture</a>
	</div>
</div>
</div>
</div>
@endsection