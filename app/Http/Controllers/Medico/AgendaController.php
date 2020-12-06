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
        $agenda = AgendaMedico::where('medico_id', auth()->user()->pessoa->medico->id)->get();
        return response()->json($agenda);
    }

    public function store(AgendaMedicoRequest $request)
    {
        $data_inicio = $request->start;
        $data_fim = $request->end;

        $agenda = AgendaMedico::create([
            'medico_id' => auth()->user()->pessoa->medico->id,
            'title' => $request->titulo,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->descricao,
        ]);

        while (strtotime($data_inicio) < strtotime($data_fim)) {
            $data_inicio = date('Y-m-d H:i:s', strtotime("+15 minutes", strtotime($data_inicio)));
            AgendaConsultas::create([
                'agenda_id' => $agenda->id,
                'medico_id' => auth()->user()->pessoa->medico->id,
                'data_consulta' => $data_inicio,
                'status_reserva' => 0,
            ]);
        }



        session()->put('sucess', 'Salvo na agenda com sucesso!');
        return redirect()->route('agenda.index');
    }
}
