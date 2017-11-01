@extends('admin.welcome')

@section('title', 'Добавяне на съдия')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>Добавяне на танцьор</h2>
		<form action="{{route('dancer.store')}}" method="POST" role="form" enctype="multipart/form-data">
			<legend><i class="fa fa-user-plus" aria-hidden="true"></i> Нов Танцьор</legend>
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Име</label>
				<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
			</div>
			<div class="form-group">
				<label for="email">Имейл</label>
				<input type="text" class="form-control" id="email" name="email" value="{{old('mail')}}">
			</div>
			<div class="form-group">
				<label for="country">Държава</label>
				<input type="text" class="form-control" id="country" name="country" value="{{old('country')}}">
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