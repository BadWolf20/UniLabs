@extends('layouts.application')

@section('maincss')
<link rel="stylesheet" href="../css/usercrud.css" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('information')
<div id="heading">
    <h1>Редактирование записи о пользователе</h1>
</div>

<form action="{{route('userEdit', $user->id)}}" method="POST" class="confirm add">
    <div>
        <input name="name" type="text"  value="{{$user->name}}">
    </div>
    <div>
        <input name="email" type="text" value="{{$user->email}}">
    </div>
    <div class="box">
        <select  name="role">
            @foreach($roles as $el)
            <option value="{{$el->Name}}"
                    @if ($el->IdRole === $roleFlag)
                selected
                @endif
                >{{$el->Name}}
            </option>
            @endforeach
        </select>
    </div>


    <div>
        <button type="submit"></button>
    </div>
    @csrf
</form>
@endsection
