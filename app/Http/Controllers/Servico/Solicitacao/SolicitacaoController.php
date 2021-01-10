<?php

namespace App\Http\Controllers\Servico\Solicitacao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Servico\SolicitacaoRequest;
use App\Models\Especilidade;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class SolicitacaoController extends Controller
{
    //
    public function index(){
        //verificao se não está logado
        if (!auth()->check()) {
            return redirect()->route('register');
        }

        $especialidades = Especilidade::all();
        return view('pages.servicos.solicitacao', [
            'especialidades' => $especialidades,
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(SolicitacaoRequest $request){
        //VERIFICA SE O ID PESSOA JA FOI CADASTRADO
        $verificacao = Solicitacao::where('pessoa_id', auth()->user()->pessoa->id)->first();
        if (isset($verificacao) && $verificacao->status == 0) {
            session()->put('error', 'Ops, parece que foi já realizou uma solicitação aguarde a correção!');
            return redirect()->route('inicio');
        }

        //INICO DE CADASTRO NA TABELA
        $especialiade = Especilidade::findOrFail($request->especialidade_id);
        $solicitacao = Solicitacao::create([
            'pessoa_id' => auth()->user()->pessoa->id,
            'especialidade_id' => $request->especialidade_id,
            'conselho' => $request->conselho,
            'num_conselho' => $request->num_conselho,
            'rqe' => $request->rqe,
            'rg' => $request->rg,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
            'procedimento' => $request->procedimento,
            'status' => 0,
        ]);

        //VERIFICACAO DE FALHAS
        if (isset($especialiade)) {
            session()->put('sucess', 'Sua solicitação foi realizada com sucesso, aguarde a verificação de um administrador!');
            return redirect()->route('inicio');
        }

        session()->put('error', 'Ops, ocorreu um erro na tentativa de solicitação!');
        return redirect()->route('inicio');
    }
}
