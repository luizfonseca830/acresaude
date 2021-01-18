<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaMedicoRequest;
use App\Models\AgendaConsultas;
use App\Models\AgendaMedico;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    //
    public function index()
    {
        return view('medico.agenda');
    }

    public function loadAgenda()
    {
//        dd(auth()->user()->pessoa->medico->auxEspecialidades);

        $agenda = AgendaMedico::where('medico_id', auth()->user()->pessoa->medico->id)->get();
        return response()->json($agenda);
    }

    public function store(AgendaMedicoRequest $request)
    {
        $data_inicio = $request->start;
        $data_fim = $request->end;

        $agenda = AgendaMedico::create([
            'medico_especialidade_id' => $request->auxEspecialidade,
            'medico_id' => auth()->user()->pessoa->medico->id,
            'title' => $request->titulo,
            'start' => $request->start,
            'end' => $request->end,
            'intervalo' => $request->intervalo,
            'description' => $request->description,
        ]);

        while (strtotime($data_inicio) < strtotime($data_fim)) {
            $data_inicio = date('Y-m-d H:i:s', strtotime("+" . $request->intervalo . " minutes", strtotime($data_inicio)));
            if (strtotime($data_inicio) < strtotime($data_fim)) {
                AgendaConsultas::create([
                    'agenda_id' => $agenda->id,
                    'data_consulta' => $data_inicio,
                    'status_reserva' => 0,
                ]);
            }
        }

        session()->put('sucess', 'Salvo na agenda com sucesso!');
        return response()->json('true');
    }

    public function update(AgendaMedicoRequest $request)
    {

        $agenda = AgendaMedico::findOrFail($request->id);
        $alterar = 0;
        if ($request->start != $agenda->start || $request->end != $agenda->end) {
            $data_inicio = $request->start;
            $data_fim = $request->end;
            $alterar = true;
        }


        $agenda->update([
            'medico_especialidade_id' => $request->auxEspecialidade,
            'medico_id' => auth()->user()->pessoa->medico->id,
            'title' => $request->titulo,
            'start' => $request->start,
            'end' => $request->end,
            'intervalo' => $request->intervalo,
            'description' => $request->description,
        ]);

        if ($alterar) {
            foreach ($agenda->agendaConsulta as $agendaConsulta) {
                $agendaConsulta->delete();
            }
            while (strtotime($data_inicio) < strtotime($data_fim)) {
                $data_inicio = date('Y-m-d H:i:s', strtotime("+" . $request->intervalo . " minutes", strtotime($data_inicio)));
                AgendaConsultas::create([
                    'agenda_id' => $agenda->id,
                    'data_consulta' => $data_inicio,
                    'status_reserva' => 0,
                ]);
            }
        }

        return response()->json(true);
    }

    public function eventDropUpdate(Request $request){
        $agenda = AgendaMedico::findOrFail($request->id);
        $alterar = 0;

        if ($request->start != $agenda->start || $request->end != $agenda->end) {
            $data_inicio = $request->start;
            $data_fim = $request->end;
            $alterar = true;
        }

        $agenda->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);

        if ($alterar) {
            foreach ($agenda->agendaConsulta as $agendaConsulta) {
                $agendaConsulta->delete();
            }
            while (strtotime($data_inicio) < strtotime($data_fim)) {
                $data_inicio = date('Y-m-d H:i:s', strtotime("+" . $request->intervalo . " minutes", strtotime($data_inicio)));
                AgendaConsultas::create([
                    'agenda_id' => $agenda->id,
                    'data_consulta' => $data_inicio,
                    'status_reserva' => 0,
                ]);
            }
        }

        return response()->json(true);
    }

    public function delete(Request $request){
        $agenda = AgendaMedico::findOrFail($request->id);
        $agenda->delete();
        return response()->json(true);
    }
}
