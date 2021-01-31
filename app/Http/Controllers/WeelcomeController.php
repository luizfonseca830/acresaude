<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\EspecilidadeMedico;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class WeelcomeController extends Controller
{
    //
    public function index()
    {
        $especialidades = Especialidade::all()->take(6);
        $this->verificar_notificacao();
        return view('welcome', [
            'especialidades' => $especialidades,
        ]);
    }

    public function verificar_notificacao()
    {
        if (auth()->check()) {
            $solicitacoes = Solicitacao::where('pessoa_id', auth()->user()->pessoa->id)->get();

            foreach ($solicitacoes as $solicitacao) {
                if ($solicitacao->status == 1 && $solicitacao->enviado_confirmacao == 0) {
                    $solicitacao->update([
                        'enviado_confirmacao' => 1,
                    ]);
                    return session()->put('sucess', 'Você foi aceito, já pode atuar em nosso serviço');
                } else {
                    if ($solicitacao->status == 2 && $solicitacao->enviado_confirmacao == 0) {
                        $solicitacao->update([
                            'enviado_confirmacao' => 1,
                        ]);
                        return session()->put('error', 'Você não foi aceito em nossa equipe, revise os documentos e tente novamente.');
                    } else if ($solicitacao->status == 0 && $solicitacao->enviado_confirmacao == 0){

                        return session()->put('error', 'Seus documentos estão em revisão, aguarde.');
                    }
                }
            }
            return false;
        }
    }
}
