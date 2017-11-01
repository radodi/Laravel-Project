@extends('admin.welcome')

@section('title', 'Добавяне на съдия')

@section('content')
<div class="row">
	<div class="col-md-8">
		@if($errors->any())
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			@foreach($errors->all() as $error)
			<p><strong>Грешка!</strong> {{$error}}</p>
			@endforeach
		</div>
		@endif
		<h2>Добавяне на съдия</h2>
		<form action="{{route('arbiter.store')}}" method="POST" role="form" enctype="multipart/form-data">
			<legend><i class="fa fa-user-plus" aria-hidden="true"></i> Нов Съдия</legend>
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Име</label>
				<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
			</div>
			<div class="form-group">
				<label for="email">Имейл</label>
				<input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
			</div>
			<div class="form-group">
				<label for="password">Парола</label>
				<input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
			</div>
			<div class="form-group">
				<label for="picture">Снимка</label>
				<input type="file" id="picture" name="picture">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection