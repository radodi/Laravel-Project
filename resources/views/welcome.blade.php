<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discover Dance</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/landing.css')}}">
</head>
<body>
    <div class="container">
        <div class="box">
            <img width="250" src="{{asset('images')}}/logo1.png" alt="Discover Dance Logo">
        </div>
        <div>
            <h1 class="text-center"><i class="fa fa-star-o" aria-hidden="true"></i> 
                Открийте Танца 
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </h1>
            <h3>Танцов Фестивал Враца</h3>
            <p class="text-justify">Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна.</p>
        </div>
        <div class="col-md-6">
        <h3><i class="fa fa-list-ol" aria-hidden="true"></i> Класиране</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Име</th>
                        <th>Държава</th>
                        <th>Резултат</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                    <tr>
                        <td>{{$result->user->name}}</td>
                        <td>{{$result->country}}</td>
                        <td>{{$result->result}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
        <h3> <i class="fa fa-users" aria-hidden="true"></i> Съдии</h3>
        @foreach($arbiters as $arbiter)
            <div class="thumbnail" style="width:150px; display: inline-block; vertical-align: top;">
            <img class="thumbnail" width="150" src="{{asset('pictures')}}/{{$arbiter->profile->picture}}" alt="{{$arbiter->name}} Picture">
            <div class="caption">
                <p>{{$arbiter->name}}</p>
            </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <h1 class="text-center"><i class="fa fa-star-o" aria-hidden="true"></i> 
                Танцьори 
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </h1>
            @foreach($dancers as $dancer)
            <div class="thumbnail" style="width:300px; display: inline-block; ">
            <img class="thumbnail" width="200" src="{{asset('pictures')}}/{{$dancer->profile->picture}}" alt="{{$dancer->name}} Picture">
            <div class="caption">
                <p><strong><i class="fa fa-user" aria-hidden="true"></i> Име: </strong>{{$dancer->name}}</p>
                <p><strong><i class="fa fa-globe" aria-hidden="true"></i> Държава: </strong>{{$dancer->profile->country}}</p>
                <p><strong><i class="fa fa-handshake-o" aria-hidden="true"></i> Краен резултат: </strong> {{$dancer->profile->result}}</p>
            </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-12 text-center">&copy 2017 Открийте Танца </div>
    </div>
</body>
</html>