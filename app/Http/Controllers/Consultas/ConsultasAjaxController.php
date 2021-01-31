<?php

namespace App\Http\Controllers\Consultas;

use App\Http\Controllers\Controller;
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
}
