@extends('layouts.application')

@section('maincss')
    <link rel="stylesheet" href="../css/gamecrud.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection
@section('information')
    <div id="heading">
        <h1>Добавление записи об игре</h1>
    </div>

    <form action="{{route('game-confirm')}}" method="POST" enctype="multipart/form-data" class="confirm add">
        <div>
            <input name="name" type="text" placeholder="Название">
        </div>
        <div>
            <input name="mark" type="text" placeholder="Оценка">
        </div>
        <div>
            <input name="watch" type="text" placeholder="Просмотры">
        </div>
        <div>
            <input name="memory" type="text" placeholder="Память">
        </div>
        <div>
            <input name="video" type="text" placeholder="Видео">
        </div>
        <div>
            <input name="download" type="text" placeholder="Загрузка">
        </div>
        <div>
            <input name="language" type="text" placeholder="Язык">
        </div>
        <div>
            <input name="date" type="date" placeholder="Дата выпуска">
        </div>
        <div class="image">
            <input type="file" name="image"/>
        </div>
        <div class="box">
            <select  name="genre">
                @foreach($genres as $el)
                    <option>{{$el->Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="box">
            <select  name="pub">
                @foreach($pubs as $el)
                    <option>{{$el->Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="box">
            <select  name="req">
                @foreach($reqs as $el)
                    <option>{{$el->Process}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <textarea rows = "5" cols = "60" name = "description" placeholder="Описание"></textarea><br>
        </div>

        <div>
            <button type="submit"></button>
        </div>
        @csrf
    </form>


@endsection
