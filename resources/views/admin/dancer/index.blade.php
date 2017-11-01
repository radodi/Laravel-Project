@extends('admin.welcome')

@section('title', 'Танцьори')

@section('content')
@if(Session::has('message'))
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Съобщение</strong> {{Session::get('message')}}
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<h2>Танцьори</h2>
		<a class="btn btn-primary" href="{{route('dancer.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Добавяне на танцьор</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th><i class="fa fa-user" aria-hidden="true"></i> Име</th>
					<th><i class="fa fa-globe" aria-hidden="true"></i> Държава</th>
					<th><i class="fa fa-sliders" aria-hidden="true"></i> Опции</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dancers as $dancer)
				<tr>
					<td>
						<img class="thumbnail" height="42" src="{{asset('pictures')}}/{{$dancer->profile->picture}}" alt="{{$dancer->name}} Picture">{{$dancer->name}}
					</td>
					<td>{{$dancer->profile->country}}</td>
					<td>
						<form action="{{route('dancer.destroy', $dancer->id)}}" method="POST">
							{{csrf_field()}}
							{{method_field("DELETE")}}
							<a class="btn btn-primary" href="{{route('dancer.edit', $dancer->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Редакриране</a>
							<a class="btn btn-warning" href="{{route('dancer.show', $dancer->id)}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Инфо</a>
							<a class="btn btn-default" href="{{route('dancer.reset_picture', $dancer->id)}}"><i class="fa fa-picture-o" aria-hidden="true"></i> Нулиране снимка</a>
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