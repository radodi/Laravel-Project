@extends('layouts.master')

@section('title', 'Lectures')

@section('style')
<link rel="stylesheet" type="text/css" href="">
@endsection
 @section('content')

<h1>{{ $lecture->name }}</h1>
<p>
	
</p>
<p>
	lectures to be added soon ...
</p>
@if ($lecture->hasHomework===1)
<p>YOU HAVE HOMEWORK</p>
<a href="{{ route('lecture.show', $lecture->id)}}">
				{{ $lecture->name }}				
			</a>	
@else
<p>YOU haven't Homework</p>
@endif
@endsection


