<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <div class="container-fluid header">
        <div class="admin_info">
            <img src="{{asset('pictures')}}/user.png" class=" admin_picture">
            <div class="user">
                @if (Auth::guest())
                <h4>Потребителски Вход</h4>
                @endif
            </div>
        </div>
    </div>
    @yield('content')
</body>
</html>