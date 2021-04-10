<?php

namespace App\Http\Controllers\DashBoard\Lista;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //
    public function index(){
        $users = User::all();

        return view('dashboard.usuario.lista', [
            'users' => $users,
        ]);
    }
}
