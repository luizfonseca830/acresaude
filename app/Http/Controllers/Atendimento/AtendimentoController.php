<?php

namespace App\Http\Controllers\Atendimento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    //
    public function index(){
        $metting_option = session('consulta');

        if(is_null($metting_option)){
            session()->put('error', 'Ops, algo de errado aconteceu!');
            return redirect()->route('inicio');
        }

//        session()->forget('consulta');
        return view('atendimento', [
            'metting_option' => $metting_option,
        ]);
    }

    public function finalizar(){

    }
}
