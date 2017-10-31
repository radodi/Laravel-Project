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
    <div class="container-fluid header">
        <div class="admin_info">
            <img src="https://scontent-sof1-1.xx.fbcdn.net/v/t1.0-1/p160x160/15095057_10202340152780580_8311261684756366793_n.jpg?oh=86cc905f12c2045a44696fd2aa9589ae&oe=5A7D75A9" class=" admin_picture">
            <div class="user">
                <h4>Radoslav Dimitrov</h4>
                <h4>Profile</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar">
                    <ul id="demo" class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"><a href="#">Home</a></li>
                        <li role="presentation"><a href="#">Profile</a></li>
                        <li role="presentation"><a href="#">Messages</a></li>
                    </ul>
            </div>
            <div class="container-fluid dash-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos praesentium aut repellendus, sunt dolorem amet voluptates doloremque omnis nam molestiae eligendi itaque, eveniet magnam nostrum soluta. Voluptate facere laborum amet!</div>
      </div>
  </div>
</body>
</html>