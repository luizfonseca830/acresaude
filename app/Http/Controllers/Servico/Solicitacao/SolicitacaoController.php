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
            'status' => 0,
        ]);

        //VERIFICAO SE EXISTE ANEXO
        if (isset($request->file_conf_med)) {
            $fileName = auth()->user()->pessoa->nome.'Confirmacao'.time().'.'.$request->file_conf_med->extension();
            $request->file_conf_med->move(public_path('documentos'), $fileName);

            $solicitacao->update([
                'documento_comprovante_medico' => $fileName,
            ]);
        }

        //VERIFICAO SE EXISTE ANEXO
        if (isset($request->file_conf_esp)) {
            $fileName = auth()->user()->pessoa->nome.$especialiade->especialidade.time().'.'.$request->file_conf_esp->extension();
            $request->file_conf_esp->move(public_path('documentos'), $fileName);

            $solicitacao->update([
                'documento_comprovante_especialidade' => $fileName,
            ]);
        }

        //VERIFICACAO DE FALHAS
        if (isset($especialiade)) {
            session()->put('sucess', 'Sua solicitação foi realizada com sucesso, aguarde a verificação de um administrador!');
            return redirect()->route('inicio');
        }

        session()->put('error', 'Ops, ocorreu um erro na tentativa de solicitação!');
        return redirect()->route('inicio');
    }
}
