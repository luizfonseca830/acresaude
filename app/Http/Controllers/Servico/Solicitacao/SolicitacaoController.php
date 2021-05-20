<?php

namespace App\Http\Controllers\Servico\Solicitacao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Servico\SolicitacaoRequest;
use App\Models\Endereco;
use App\Models\Especialidade;
use App\Models\Pessoa;
use App\Models\Solicitacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SolicitacaoController extends Controller
{
    //
    public function index()
    {
        $especialidades = Especialidade::all();
        return view('pages.servicos.solicitacao', [
            'especialidades' => $especialidades,
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(SolicitacaoRequest $request)
    {

        //INICO DE CADASTRO NA TABELA

        $usuario = User::create([

            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $pessoa = Pessoa::create([
            'user_id' => $usuario->id,
            'tipo_usuario_id' => 3,
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cpf' => $request->cpf,
            'cnpj' => $request->cnpj,
            'data_nascimento' => $request->data_nascimento,
            'image' => $request->image,
        ]);

        $endereco = Endereco::create([
            'pessoa_id' => $pessoa->id,
            'cep' => $request->cep,
            'uf' => $request->uf,
            'bairro' => $request->bairro,
            'municipio' => $request->municipio,
            'complemento' => $request->complemento,
            'endereco' => $request->endereco,
        ]);
        $especialiade = Especialidade::findOrFail($request->especialidade_id);

        $solicitacao = Solicitacao::create([
            'pessoa_id' => $pessoa->id,
            'especialidade_id' => $especialiade->id,
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
        if (isset($solicitacao)) {
            if (!is_null($endereco)) {
                session()->put('sucess', 'Sua solicitação foi realizada com sucesso, aguarde a verificação de um administrador!');
                Auth::attempt(['email' => $usuario->email, 'password' => $usuario->password]);
                Auth::guard()->login($usuario);
                return redirect()->route('inicio');
            }
        }

        session()->put('error', 'Ops, ocorreu um erro na tentativa de solicitação!');
        return redirect()->route('inicio');
    }
}
