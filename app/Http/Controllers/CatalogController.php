<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Games;
use App\Models\Genres;
use App\Models\Publishers;
use App\Models\Requests;
use App\Models\Requirement;
use Illuminate\Http\Request;

class CatalogController extends Controller
{


    public function catalog(){
        $games = Games::orderBy('Date')->paginate(16);
        $s = "Поиск";
        $pubs = Publishers::get();
        $genres = Genres::get();

        return view('catalog',
            compact('games', 'pubs', 'genres', 's'));
    }
    public function search(Request $request)
    {
        $s = $request->s;
        $genre = null;
        $pub = null;
        $where=array();
        if($request->genre != "Все жанры")
        {
            $genre = Genres::where('Name', 'LIKE', "%".$request->genre."%")->first()->IdGenre;
            $a = ['IdGenre', '=', $genre];
            array_push($where, $a);
        }
        if($request->pub != "Все издатели"){
            $pub = Publishers::where('Name', 'LIKE', "%".$request->pub."%")->first()->IdPublisher;
            $a =   ['IdPublisher', '=', $pub];
            array_push($where, $a);
        }

        $name = ['Name', 'LIKE', "%".$s."%"];
        array_push($where, $name);
        $games = Games::where($where)->simplePaginate(16);


        $pubs = Publishers::get();
        $genres = Genres::get();

        return view('catalog',
            compact('games', 'pubs', 'genres','s'));
    }


    public function home(){
        return view('home');
    }
    public function game($IdGame){
        $game = Games::where('IdGame', $IdGame)->first();
        $reqs = Requirement::where('IdRequirement',$game->IdRequirement)->first();
        $newgames = Games::orderBy('Date')->take(5)->get();
        return view('game', ['game' => $game, 'reqs' => $reqs, 'newgames' => $newgames]);
    }

    public function contacts(){
        return view('contacts');
    }
    public function support(){
        return view('support');
    }
}
