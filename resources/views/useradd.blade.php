@extends('layouts.application')

@section('maincss')
    <link rel="stylesheet" href="../css/usercrud.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('information')
    <div id="heading">
        <h1>Добавление записи о пользователе</h1>
    </div>

    <form action="{{route('userAdd')}}" method="POST" class="confirm add">
        <div>
            <input name="name" type="text" placeholder="Логин">
        </div>
        <div>
            <input name="email" type="text" placeholder="Почта">
        </div>
        <div>
            <input name="password" type="text" placeholder="Пароль">
        </div>
        <div class="box">
            <select  name="role">
                @foreach($roles as $el)
                    <option>{{$el->Name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit"></button>
        </div>
        @csrf
    </form>
@endsection
