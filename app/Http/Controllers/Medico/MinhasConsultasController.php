<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Models\AgendaConsultas;
use App\Models\AgendaMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MinhasConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        dd(auth()->user()->pessoa->medico);
        $agendaMedico = AgendaMedico::where('medico_id', auth()->user()->pessoa->medico->id)->get();
        return view('medico.minha_consultas', [
            'agendaMedico' => $agendaMedico
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $consulta = AgendaConsultas::findOrFail($id);
        $consulta->update([
            'sala_consulta' => Hash::make($consulta->paciente->nome),
        ]);

        session()->put('consulta', $consulta);
        return redirect()->route('atendimento.index');
    }

    public function finalizarConsulta(Request $request){
        $consulta = AgendaConsultas::findOrFail($request->consulta_id);

        if (!is_null($consulta->status_finalizado)) {
            return 1;
        }
        else return 0;
    }
}
