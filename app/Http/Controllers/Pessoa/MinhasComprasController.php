<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Servicos\PagarmeController;
use App\Models\Compras;
use Illuminate\Http\Request;

class MinhasComprasController extends Controller
{
    //
    private $pagarme;

    public function __construct()
    {
        $this->pagarme = PagarmeController::pagarme();
    }

    public function index(){
        $compras = Compras::where('pessoa_id', auth()->user()->pessoa->id)->get();
        //VERIFICAR COMPRAS
        $compras_verificar = Compras::where('pessoa_id', auth()->user()->pessoa->id)->where('status_compra', 'waiting_payment')->get();
        $pargarme = PagarmeController::pagarme();
//        dd($compras_verificar);

        foreach ($compras_verificar as $verificar) {
//            dd($verificar->pagarme_id);
            $status_compra = $pargarme->transactions()->get([
                'id' => $verificar->pagarme_id
            ]);

            if ($status_compra->status == 'paid') {
                $verificar->update([
                    'status_compra' => $status_compra->status
                ]);
            }
        }

        return view('paciente.minhas_compras', [
            'compras' => $compras,
        ]);
    }
}
