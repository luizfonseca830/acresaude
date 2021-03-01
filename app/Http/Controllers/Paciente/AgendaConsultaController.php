<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaConsultaRequest;
use App\Models\AgendaConsultas;
use App\Models\EspecilidadeMedico;
use App\Models\Medico;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class AgendaConsultaController extends Controller
{
    //
    public function index($id){
//        dd(1);
        $medicos = Medico::all();
        return view('paciente.agenda_consulta', [
            'medicos' => $medicos,
            'compra_id' => $id,
        ]);
    }

    public function show(Request $request){

        $agenda_consulta_dis = AgendaConsultas::where('medico_id', $request->medico_id)->where('status_reserva', 0)->get();
        return response()->json($agenda_consulta_dis);
    }

    public function marcaConsulta(AgendaConsultaRequest $request, $compra_id){
        $agenda = AgendaConsultas::findOrFail($request->agenda_id);
        if ($agenda->status_reserva == 1) {
            session()->put('error', 'Ops, parece que selecionaram essa data já');
            return redirect()->route('paciente.agenda.index');
        }
        $agenda->update([
            'paciente_id' => auth()->user()->pessoa->id,
            'status_reserva' => 1,
            'compra_id' => $compra_id,
        ]);

        session()->put('sucess', 'Sua consulta foi agendada com sucesso!');
        return redirect()->route('minhascompras.index');
    }

}
