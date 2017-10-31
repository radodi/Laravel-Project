@extends('layouts.master')

@section('title', 'Courses')

@section('style')
<link rel="stylesheet" type="text/css" href="">
@endsection
 @section('content')





<div class="container">
<div class="row">
	<div class="col-md-6">
	<h1>Courses</h1>

	@foreach($courses as $course)
	{{ $course->name }}
	
@endforeach
	</div>	
</div>
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
			Edit Lecture
		</td>
		<td>
			Delete lecture
		</td>
	</tr>
	@foreach($course->lectures as $lecture)
	<tr>
		<td>
			<a href="{{ route('course.show', $lecture->id)}}">
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
			<a href="#" class="btn btn-info">Edit</a>
		</td>
		<td>
			Delete</a>
		</td>
	</tr>
@endforeach
</table>
<div class="row">
	<div class="col-md-6">
		<a href="#" class="btn btn-info">Add New Lecture</a>
	</div>
</div>
</div>
</div>
@endsection 