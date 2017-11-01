<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <div class="container-fluid header">
        <div class="admin_info">
            <img src="{{asset('pictures')}}/user.png" class=" admin_picture">
            <div class="user">
                @if(Auth::guest())
                <h4>Гост</h4>
                @else
                <h4>{{Auth::user()->name}}</h4>
                <h4>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Изход</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </a>
                </h4>
                @endif
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar">
                @if(Auth::check())
                    <ul id="demo" class="nav nav-pills nav-stacked">
                        <li role="presentation" {{Request::is('admin') ? 'class=active' : ''}}><a href="{{route('admin')}}"><i class="fa fa-tachometer"></i> Табло</a></li>
                        @if(Auth::user()->role == 'admin')
                        <li role="presentation" {{Request::is('arbiter*') ? 'class=active' : ''}}><a href="{{route('arbiter.index')}}"><i class="fa fa-th-list" aria-hidden="true"></i> Съдии</a></li>
                        <li role="presentation" {{Request::is('dancer*') ? 'class=active' : ''}}><a href="{{route('dancer.index')}}"><i class="fa fa-th-list" aria-hidden="true"></i> Танцьори</a></li>
                        <li role="presentation" {{Request::is('result*') ? 'class=active' : ''}}><a href="{{route('result')}}"><i class="fa fa-table" aria-hidden="true"></i> Резултати</a></li>
                        @endif
                        @if(Auth::user()->role == 'arbiter')
                        <li role="presentation" {{Request::is('vote*') ? 'class=active' : ''}}><a href="{{route('vote')}}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Оценяване</a></li>
                        @endif
                    </ul>
                @endif
            </div>
            <div class="container-fluid dash-content">
               @yield('content')
            </div>
      </div>
  </div>
</body>
</html>