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
		<h2>Оценяване	</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th><i class="fa fa-user" aria-hidden="true"></i> Име</th>
					<th><i class="fa fa-globe" aria-hidden="true"></i> Държава</th>
					<th><i class="fa fa-sliders" aria-hidden="true"></i> Критерии</th>
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
						<form action="{{route('vote.store')}}" method="POST" class="form-inline">
							{{csrf_field()}}
							<input type="hidden" name="dancer_id" value="{{$dancer->id}}">
							<input type="hidden" name="arbiter_id" value="{{Auth::user()->id}}">
							<div class="form-group">
								<label for="first_criterion{{$dancer->id}}">Критерии 1</label>
								<select name="first_criterion" id="first_criterion{{$dancer->id}}">
								@for ($i=1; $i <= 10 ; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
								</select>
							</div>
							<div class="form-group">
								<label for="second_criterion{{$dancer->id}}">Критерии 2</label>
								<select name="second_criterion" id="second_criterion{{$dancer->id}}">
								@for ($i=1; $i <= 10 ; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
								</select>
							</div>
							<div class="form-group">
								<label for="third_criterion{{$dancer->id}}">Критерии 3</label>
								<select name="third_criterion" id="third_criterion{{$dancer->id}}">
								@for ($i=1; $i <= 10 ; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
								</select>
							</div>
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Оцени</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection