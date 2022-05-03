<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Games;
use App\Models\Genres;
use App\Models\Publishers;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\File;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{

    public function index()
    {
        $pubs = Publishers::get();
        $genres = Genres::get();
        $reqs = Requirement::get();

        return view('gameadd', compact('pubs', 'genres', 'reqs'));
    }
    public function gameAdd(Request $req)
    {
        $idReq = Requirement::where('Process', $_POST['req'])->first()->IdRequirement;
        $idGenre = Genres::where('Name', $_POST['genre'])->first()->IdGenre;
        $idPub = Publishers::where('Name', $_POST['pub'])->first()->IdPublisher;

        $path2 = 'Пусто';

        if($req->hasFile('image')){
            $destination_path = 'public/images/games';
            $image = $req->file('image');
            $image_name = $req->file('image')->getClientOriginalName();
            $path = $req->file('image')->storeAs($destination_path, $image_name);
            $path2 = $image_name;
        }

        $game = Games::create(
            ['Name' => $_POST['name'],
                'Mark' => $_POST['mark'],
                'Watch' => (integer)$_POST['watch'],
                'Memory' => $_POST['memory'],
                'Video' => $_POST['video'],
                'Download' => $_POST['download'],
                'Language' => $_POST['language'],
                'Date' => $_POST['date'],
                'Image' => $path2,
                'IdGenre' => $idGenre,
                'IdPublisher' => $idPub,
                'IdRequirement' => $idReq,
                'Description' => $_POST['description'],
                ]
        );
        $game->save();

        session()->flash('success','Игра добавлена');
        return redirect()->route('catalog');
    }
    public function gameEditForm($IdGame)
    {
        $pubs = Publishers::get();
        $genres = Genres::get();
        $reqs = Requirement::get();
        $game = Games::where('IdGame', $IdGame)->first();

        $genreFlag = $game->IdGenre;
        $pubFlag = $game->IdPublisher;
        $reqFlag = $game->IdRequirement;

        return view('gameedit', compact('game', 'pubs', 'genres', 'reqs', 'genreFlag', 'pubFlag', 'reqFlag'));
    }
    public function gameEdit($IdGame, Request $req)
    {

        $path2 = 'Пусто';

        if($req->hasFile('image')){
            $destination_path = 'public/images/games';
            $image = $req->file('image');
            $image_name = $req->file('image')->getClientOriginalName();
            $path = $req->file('image')->storeAs($destination_path, $image_name);
            $path2 = $image_name;
        }

        $game = Games::where('IdGame', $IdGame)->first();
        $game->Name = $_POST['name'];
        $game->Mark = (int)$_POST['mark'];
        $game->Watch = (int)$_POST['watch'];
        $game->Memory = (int)$_POST['memory'];
        $game->Video = $_POST['video'];
        $game->Download = $_POST['download'];
        $game->Language = $_POST['language'];
        $game->Date = $_POST['date'];
        $game->Image = $path2;
        $game->Description = $_POST['description'];


        $idGenre = Genres::where('Name', $_POST['genre'])->first()->IdGenre;
        $idPub = Publishers::where('Name', $_POST['pub'])->first()->IdPublisher;
        $idReq = Requirement::where('Process', $_POST['req'])->first()->IdRequirement;

        $game->IdGenre = $idGenre;
        $game->IdPublisher = $idPub;
        $game->IdRequirement = $idReq;
        $game->save();

        session()->flash('success','Игра изменена');
        return redirect()->route('catalog');
    }
    public function gameRemove($IdGame)
    {
        $g = Games::where('IdGame', $IdGame)->first();
        Storage::delete($g->Image);
        $game = Games::where('IdGame', $IdGame)->first()->delete();
        session()->flash('success','Игра удалена');
        return redirect()->route('catalog');
    }

}
