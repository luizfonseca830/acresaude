<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\AgendaConsultas;
use Illuminate\Http\Request;

class MinhasConsultasController extends Controller
{
    //
    public function index(){
        $consultas = AgendaConsultas::where('paciente_id', auth()->user()->pessoa->id)->get();
        return view('paciente.minhas_consultas', [
            'consultas' => $consultas,
        ]);
    }

    public function entrarNaSala($id){
        $consulta = AgendaConsultas::findOrFail($id);
        session()->put('consulta', $consulta);
        return redirect()->route('atendimento.index');
    }
}
