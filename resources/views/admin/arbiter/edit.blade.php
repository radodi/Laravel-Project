@extends('admin.welcome')

@section('title', 'Редактиране на съдия')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>Редактиране на съдия {{$arbiter->name}}</h2>
		<form action="{{route('arbiter.update', $arbiter->id)}}" method="POST" role="form" enctype="multipart/form-data">
			<legend><i class="fa fa-user" aria-hidden="true"></i> Съдия</legend>
			{{csrf_field()}}
			{{method_field('PUT')}}
			<div class="form-group">
				<label for="name">Име</label>
				<input type="text" class="form-control" id="name" name="name" value="{{$arbiter->name}}">
			</div>
			<div class="form-group">
				<label for="email">Имейл</label>
				<input type="text" class="form-control" id="email" name="email" value="{{$arbiter->email}}">
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