<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Models\AgendaConsultas;
use App\Models\Prontuario;
use Illuminate\Http\Request;

class ProntuarioController extends Controller
{
    //

    public function salvaProntuario(Request $request, $consulta_id)
    {
        $consulta = AgendaConsultas::findOrFail($consulta_id);
        $consulta->update([
            'status_finalizado' => 1,
        ]);

        $prontuario = Prontuario::create([
            'agenda_consulta_id' => $consulta->id,
            'prontuario' => $request->prontuario,
            'medico_id' => $consulta->medico_id,
            'paciente_id' => $consulta->paciente_id,
        ]);

        session()->put('sucess', 'Consulta finalizada com sucesso!');
        return redirect()->route('medico.consultas.index');
    }
}
