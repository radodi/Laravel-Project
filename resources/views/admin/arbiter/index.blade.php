@extends('admin.welcome')

@section('title', 'Съдии')

@section('content')
@if(Session::has('message'))
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Съобщение</strong> {{Session::get('message')}}
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<h2>Съдии</h2>
		<a class="btn btn-primary" href="{{route('arbiter.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Добавяне на съдия</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th><i class="fa fa-user" aria-hidden="true"></i> Име</th>
					<th><i class="fa fa-envelope" aria-hidden="true"></i> Имеил</th>
					<th><i class="fa fa-sliders" aria-hidden="true"></i> Опции</th>
				</tr>
			</thead>
			<tbody>
				@foreach($arbiters as $arbiter)
				<tr>
					<td>
						<img class="thumbnail" height="42" src="{{asset('pictures')}}/{{$arbiter->profile->picture}}" alt="{{$arbiter->name}} Picture">{{$arbiter->name}}
					</td>
					<td>{{$arbiter->email}}</td>
					<td>
						<form action="{{route('arbiter.destroy', $arbiter->id)}}" method="POST">
							{{csrf_field()}}
							{{method_field("DELETE")}}
							<a class="btn btn-primary" href="{{route('arbiter.edit', $arbiter->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Редакриране</a>
							<a class="btn btn-default" href="{{route('arbiter.reset_picture', $arbiter->id)}}"><i class="fa fa-picture-o" aria-hidden="true"></i> Нулиране снимка</a>
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Изтриване</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection