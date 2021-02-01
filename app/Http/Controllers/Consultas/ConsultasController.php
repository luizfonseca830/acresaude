<?php

namespace App\Http\Controllers\Consultas;

use App\Http\Controllers\Controller;
use App\Models\AgendaConsultas;
use App\Models\Compras;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $especialidades = Especialidade::all();
        return view('pages.servicos.consultas', [
            'especialidades'=> $especialidades,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $especialidade = Especialidade::findOrFail($id);
        return view('pages.servicos.consulta-visualizar', [
            'especialidade' => $especialidade
        ]);
    }


    public function indexPagamento(Request $request){

        $agenda = AgendaConsultas::findOrFail($request->agenda_id);
        $pagamento = new PagamentoController();

        $linkPagamento = $pagamento->pagamento($agenda);
        Compras::create([
            'pessoa_id' => auth()->user()->pessoa->id,
            'pagarme_id' => $linkPagamento->id,
            'status_compra' => $linkPagamento->status,
        ]);
        session()->put('sucess', 'Pedido realizado com sucesso');
        return response()->json($linkPagamento);
//        dd($agenda);
//        return view('pages.servicos.pagamento', [
//            'agenda' => $agenda,
//        ]);
    }
}
