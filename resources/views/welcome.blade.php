<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <div class="container">
        <h1>Начална Страница</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos praesentium aut repellendus, sunt dolorem amet voluptates doloremque omnis nam molestiae eligendi itaque, eveniet magnam nostrum soluta. Voluptate facere laborum amet!</p>


@if(Session::has('message'))
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Съобщение</strong> {{Session::get('message')}}
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <h2>Танцьори Резултати</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><i class="fa fa-user" aria-hidden="true"></i> Име</th>
                    <th><i class="fa fa-globe" aria-hidden="true"></i> Държава</th>
                    <th><i class="fa fa-sliders" aria-hidden="true"></i> Резултат</th>
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
                   {{$dancer->profile->result}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>
</body>
</html>