<?php

namespace App\Http\Controllers;

use App\Models\Especilidade;
use App\Models\EspecilidadeMedico;
use Illuminate\Http\Request;

class WeelcomeController extends Controller
{
    //
    public function index(){
        $especialidades = Especilidade::all()->take(6);
        return view('welcome', [
            'especialidades' => $especialidades,
        ]);
    }
}
