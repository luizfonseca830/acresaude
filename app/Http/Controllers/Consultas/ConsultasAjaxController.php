<?php

namespace App\Http\Controllers\Consultas;

use App\Http\Controllers\Controller;
use App\Models\AgendaConsultas;
use App\Models\AgendaMedico;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class ConsultasAjaxController extends Controller
{
    /*
     * The request receives request goes to ajax
     * Returns a json for the request
     */
    public function search(Request $request){
        //REALIZAR PESQUISA
        $especialidade = Especialidade::where('especialidade', 'like', '%'.$request->especialidade.'%')->get();
        return response()->json($especialidade);
    }

    public function searchMedicoHorario(Request $request){
        $agendaMedicos = AgendaMedico::where('medico_especialidade_id', $request->especialidade_id)->where('medico_id', $request->medico_id)->get();
        $consultas = array();
        foreach ($agendaMedicos as $agendaMedico){
           foreach ($agendaMedico->buscaVaga($agendaMedico->id) as $consulta){
                array_push($consultas, $consulta);
           }

        }
        return response()->json($consultas);
    }

    public function price(Request $request){
//        return response()->json($request->all());
        $agenda = AgendaConsultas::findOrFail($request->id);

        return response()->json($agenda->agendaMedico->preco);
    }
}
