<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Models\AgendaMedico;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    //
    public function index(){
        return view('medico.agenda');
    }

    public function loadAgenda(){
        $agenda = AgendaMedico::where('medico_id', auth()->user()->pessoa->id)->get();
        return response()->json($agenda);
    }
}
