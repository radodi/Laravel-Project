@extends('admin.welcome')
@section('title', 'Резултати')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Обработка Резултати</h2>
		@if(isset($message))
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Съобщение</strong> {{$message}}
			</div>
		@endif
		@if(isset($dancers))
		@foreach($dancers as $dancer)	
		<div class="thumbnail" style="width:300px; display: inline-block; ">
			<img class="thumbnail" width="200" src="{{asset('pictures')}}/{{$dancer->profile->picture}}" alt="{{$dancer->name}} Picture">
			<div class="caption">
				<p><strong><i class="fa fa-user" aria-hidden="true"></i> Име: </strong>{{$dancer->name}}</p>
				<p><strong><i class="fa fa-globe" aria-hidden="true"></i> Държава: </strong>{{$dancer->profile->country}}</p>
				<p><strong><i class="fa fa-handshake-o" aria-hidden="true"></i> Краен резултат: </strong> {{$dancer->profile->result}}</p>
				<p><strong><i class="fa fa-sliders" aria-hidden="true"></i> Резултати</strong></p>
			</div>
			<table class="table table-hover">
				@foreach($dancer->results as $result )
				@if($result->invalid)
				<tr class="bg-danger">
					@else
				<tr>
				@endif
					<td>{{$result->first_criterion}}</td>
					<td>{{$result->second_criterion}}</td>
					<td>{{$result->third_criterion}}</td>
				</tr>
				@endforeach
			</table>
			<p class="text-center">
				<a href="{{route('result.validate',$dancer->id)}}" class="btn btn-primary">Изчисли резултат</a>
			</p>
		</div>
		@endforeach
		@endif
	</div>
</div>
@endsection