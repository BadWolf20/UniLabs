<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Genres;
use App\Models\Publishers;
use App\Models\Requests;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user', compact ('users'));
    }
    public function indexUserAdd()
    {
        $roles = Roles::get();
        return view('useradd', compact('roles'));
    }
    public function userAdd(Request $req)
    {

        $user = User::create(
            ['name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password'])]
        );
        $idRole = Roles::where('Name', $_POST['role'])->first()->IdRole;
        $user->IdRole = $idRole;
        $user->save();

        session()->flash('success','Пользователь добавлен');
        return redirect()->route('user');
    }
    public function indexUserEdit($IdUser)
    {
        $roles = Roles::get();
        $user = User::where('id', $IdUser)->first();
        $roleFlag = $user->IdRole;
        return view('useredit', compact('roles', 'roleFlag', 'user'));
    }
    public function userEdit($IdUser, Request $req)
    {
        $user = User::where('id', $IdUser)->first();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $idRole = Roles::where('Name', $_POST['role'])->first()->IdRole;
        $user->IdRole = $idRole;

        $user->save();

        session()->flash('success','Пользователь изменен');
        return redirect()->route('user');
    }
    public function userRemove($IdUser)
    {
        $user = User::where('id', $IdUser)->first()->delete();

        session()->flash('success','Пользователь удален');
        return redirect()->route('user');
    }
}
