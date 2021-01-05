<?php

namespace App\Http\Controllers\DashBoard\Solicitacao;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use App\Models\MedicoEspecilidade;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solicitacoes = Solicitacao::where('status', 0)->get();

        return view('dashboard.solicitacoes.medico', [
            'solicitacoes' => $solicitacoes,
        ]);
    }

    public function aceitar($id){
        $solicitacao = Solicitacao::findOrFail($id);

        $solicitacao->update([
            'status' => 1,
            'enviado_confirmacao' => 1,
        ]);

        $medico = Medico::create([
            'pessoa_id' => $solicitacao->pessoa->id,
        ]);

        $medico_especialidade = MedicoEspecilidade::create([
            'medico_id' => $medico->id,
            'especialidade_id' => $solicitacao->especialidade->id,
        ]);

        if (isset($medico) && isset($medico_especialidade)) {
            session()->put('sucess', 'O médico agora faz parte da nossa equipe.');
            return redirect()->route('home.dashboard');
        }
        session()->put('error', 'Ops, algo de errado aconteceu.');
        return redirect()->route('home.dashboard');
    }
}
