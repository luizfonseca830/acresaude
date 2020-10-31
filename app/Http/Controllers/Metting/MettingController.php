<?php

namespace App\Http\Controllers\Metting;

use App\Http\Controllers\Controller;
use App\Models\AgendaConsultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MettingController extends Controller
{

    public function index()
    {
        $metting_option = session()->get('metting_option');
        //error
        if (is_null($metting_option)) {
            return redirect()->route('home');
        }

        return view('atendimento', [
            'metting_option' => $metting_option
        ]);
    }

    //
    public function show($id)
    {
        $consulta = AgendaConsultas::findOrFail($id);

        if (is_null($consulta->sala_consulta)) {
            $sala_nome = Hash::make('consulta_1');
            $consulta->update([
                'sala_consulta' => $sala_nome
            ]);
        } else $sala_nome = $consulta->sala_consulta;

        $nome_completo = auth()->user()->nome . ' ' . auth()->user()->sobrenome;
        $metting_option = [
            'time_max_call' => 40,
            'name_room' => $sala_nome,
            'user_name' => $nome_completo,
        ];

        session()->put('metting_option', $metting_option);

        return redirect()->route('atendimento.index');
    }
}
