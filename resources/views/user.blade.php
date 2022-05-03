@extends('layouts.application')

@section('maincss')
    <link rel="stylesheet" href="../css/user.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection
@section('information')
    <div id="heading">
        <h1>Пользователи</h1>
    </div>
    <div class="container">
        <div class="rowlabel row">
            <div class="col-3">
                Имя
            </div>
            <div class="col-3">
                Почта
            </div>
            <div class="col-3">
                Роль
            </div>
            <div class="col-1" >
                <a href="{{route('indexUserAdd')}}"><i class="bi bi-person-plus"></i></a>
            </div>

        </div>
    </div>
        @foreach($users as $el)
            <div class="container">
                <div class="row">
                    <div class="col-3">{{$el->name}}</div>
                    <div class="col-3">{{$el->email}}</div>
                    @if(!is_null($el->role))
                        <div class="col-3">{{$el->role->Name}}</div>
                        @else
                        <div class="col-3">Нет роли</div>
                    @endif

                    <a class="col-1" href="{{route('indexUserEdit', $el->id)}}"><span class="bi bi-pencil-square"></span></a>
                    <a class="col-1" href="{{route('userRemove', $el->id)}}"><span class="bi bi-file-x"></span></a>
                </div>

            </div>
        @endforeach
@endsection






