@extends('layouts.application')

@section('maincss')
    <link rel="stylesheet" href="../css/gamecrud.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('information')
    <div id="heading">
        <h1>Редактирование записи об игре</h1>
    </div>

    <div class="bodyStr">
        <div>
            <p>Название игры</p>
            <p>Оценка</p>
            <p>Просмотры</p>
            <p>Память</p>
            <p>Видео</p>
            <p>Загрузка</p>
            <p>Язык</p>
            <p>Дата</p>
            <p>Картинка</p>
            <p>Жанр</p>
            <p>Издатель</p>
            <p>Требования</p>
            <p>Описание</p>

        </div>
        <div>
            <form action="{{route('gameEdit', $game->IdGame)}}" method="POST" enctype="multipart/form-data" class="confirm add">
                <div>
                    <input name="name" type="text"  value="{{$game->Name}}">
                </div>
                <div>
                    <input name="mark" type="text" value="{{$game->Mark}}">
                </div>
                <div>
                    <input name="watch" type="text" value="{{$game->Watch}}">
                </div>
                <div>
                    <input name="memory" type="text" value="{{$game->Memory}}">
                </div>
                <div>
                    <input name="video" type="text" value="{{"$game->Video"}}">
                </div>
                <div>
                    <input name="download" type="text" value="{{"$game->Download"}}">
                </div>
                <div>
                    <input name="language" type="text" value="{{"$game->Language"}}">
                </div>
                <div>
                    <input name="date" type="date" value="{{"$game->Date"}}">
                </div>
                <div>
                    <input name="image" type="file" value="{{"$game->Image"}}">
                </div>
                <div class="box">
                    <select  name="genre">
                        @foreach($genres as $el)
                            <option value="{{$el->Name}}"
                                    @if ($el->IdGenre === $genreFlag)
                                    selected
                                @endif
                            >{{$el->Name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="box">
                    <select  name="pub">
                        @foreach($pubs as $el)
                            <option value="{{$el->Name}}" @if($el->IdPublisher === $pubFlag)
                            selected
                                @endif
                            >{{$el->Name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="box">
                    <select  name="req">
                        @foreach($reqs as $el)
                            <option value="{{$el->Process}}" @if ($el->IdRequirement === $reqFlag)
                            selected
                                @endif
                            >{{$el->Process}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <textarea rows = "5" cols = "60" name = "description">{{$game->Description}}</textarea><br>
                </div>

                <div>
                    <button type="submit"></button>
                </div>
                @csrf
            </form>
        </div>
    </div>


@endsection
