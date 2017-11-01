@extends('admin.welcome')

@section('title', 'Редактиране на танцьор')

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
		<h2>Редактиране на танцьор {{$dancer->name}}</h2>
		<form action="{{route('dancer.update', $dancer->id)}}" method="POST" role="form" enctype="multipart/form-data">
			<legend><i class="fa fa-user" aria-hidden="true"></i> Танцьор</legend>
			{{csrf_field()}}
			{{method_field('PUT')}}
			<div class="form-group">
				<label for="name">Име</label>
				<input type="text" class="form-control" id="name" name="name" value="{{$dancer->name}}">
			</div>
			<div class="form-group">
				<label for="email">Имейл</label>
				<input type="text" class="form-control" id="email" name="email" value="{{$dancer->email}}">
			</div>
			<div class="form-group">
				<label for="country">Държава</label>
				<input type="text" class="form-control" id="country" name="country" value="{{$dancer->profile->country}}">
			</div>
			<div class="form-group">
				<label for="password">Парола</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<div class="form-group">
				<label for="picture">Снимка</label>
				<input type="file" id="picture" name="picture">
				<small class="text-info">*Избира се само ако е необходима смяна на снимка.</small>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection