
@extends('layouts.application')

@section('maincss')
    <link rel="stylesheet" href="../css/game.css" type="text/css">
    <link rel="stylesheet" href="../css/apphome.css" type="text/css">
    <link rel="stylesheet" href="../css/fonts.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <script src="https://kit.fontawesome.com/55bd70fc93.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection
@section('information')
    <div id="heading">
        <h1>{{$game->Name}}</h1>
    </div>
    <div class="content">
        <div class="image">
            <img src="{{asset('/storage/images/games/'.$game->Image)}}" width="300" height="400" alt="">
        </div>
        <div class="info">
            <p>
            <div class="solid"> Дата выхода: </div> {{$game->Date}}
            </p>
            <p>
            <div class="solid"> Интерфейс: </div> {{$game->Language}}
            </p>
            <p>
            <div class="solid">Разработчик: </div> {{$game->publisher->Name}}
            </p>
            <p>
            <div class="solid"> Жанр:</div> {{$game->genre->Name}}
            </p>
            <p>
            <div class="solid"> Оценка: </div> {{$game->Mark}}
            </p>
            <p>
            <div class="solid">Просмотров:</div> {{$game->Watch}}
            </p>
            <p>
            <div class="solid">Торрент:</div> <a href="{{$game->Download}}">Скачать</a>

            </p>


        </div>

            @auth
                @if(Auth::user()->IdRole === 1 || Auth::user()->IdRole === 2)
                <div>
                    <a href="{{route('game-edit', $game->IdGame)}}"><i class="bi bi-pencil-square"></i></a>
                </div>
                <div>
                    <a href="{{route('gameRemove', $game->IdGame)}}"><i class="bi bi-file-x"></i></a>
                </div>
                    @endif
            @endauth
        </div>


    <div class="des">
        <p>Описание</p>
        {{$game->Description}}
    </div>

    <div class="video">
        <p>Геймплей/Трейлер:</p>
        <iframe width="560" height="315" src="{{$game->Video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="new">
        <p>Горячие новинки</p>
        <div class="team-row">
            @foreach($newgames as $el)
                <figure>
                    <img src="{{asset('/storage/images/games/'.$el->Image)}}" width="210" height="310" alt="">
                    <figcaption>
                        <a href="{{route('game', $el->IdGame)}}">{{$el->Name}}</a>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
    <div class="reqs">
        <p>Требования к железу</p>

        <span class="solidreq">Поддержка Windows:</span> {{$reqs->Windows}} <br>
        <p></p>
        <span class="solidreq">Процессор:</span> {{$reqs->Process}} <br>
        <p></p>
        <span class="solidreq">Оперативная память:</span> {{$reqs->OperMemory}} GB <br>
        <p></p>
        <span class="solidreq">Графический ускоритель:</span> {{$reqs->Graphic}} <br>
        <p></p>
        <span class="solidreq">Место на диске:</span> {{$game->Memory}} GB

    </div>
@endsection
