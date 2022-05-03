@extends('layouts.application')

@section('maincss')
    <link rel="stylesheet" href="../css/apphome.css" type="text/css">
    <link rel="stylesheet" href="../css/filters.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection
@section('information')
    <div id="heading">
        <h1>КАТАЛОГ</h1>
    </div>
    <form method="get" action="{{route('search')}}">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <aside class="asides">
                    <div class="filterbox">
                        <label class="labelfilter">Жанр</label>
                        <div class="box">
                            <select  name="genre">
                                <option>Все жанры</option>
                                @foreach($genres as $el)
                                    <option>{{$el->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filterbox">
                        <label class="labelfilter">Издатель</label>
                        <div class="box">
                            <select name="pub">
                                <option>Все издатели</option>
                                @foreach($pubs as $el)
                                    <option>{{$el->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-9">
                <section>
                    <div class="d1">
                            <div class="search-box">
                                <div class="search1">
                                    <input type="text" name="s" placeholder="{{$s}}">
                                </div>
                                <div class="search2">
                                    <button  class="btn btn-info" type="submit">Поиск</button>
                                </div>
                                @auth
                                    @if(Auth::user()->IdRole === 1 || Auth::user()->IdRole === 2)
                                    <a href="{{route('gameadd')}}"><i class="bi bi-journal-plus"></i></a>
                                    @endif
                                @endauth
                            </div>
                    </div>
                    <div class="team-row">
                        @foreach($games as $el)
                            <figure>
                                <img src="{{asset('/storage/images/games/'.$el->Image)}}" width="210" height="310" alt="">
                                <figcaption>
                                    <a href="{{route('game', $el->IdGame)}}">{{$el->Name}}</a>
                                    <span>{{$el->publisher->Name}}, {{$el->Date}}</span>
                                    <span>Просмотров: {{$el->Watch}}</span>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                    {{$games->links('pagination::bootstrap-4')}}
                </section>
            </div>
        </div>
    </div>
    </form>
@endsection





