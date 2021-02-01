<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Servicos\PagarmeController;
use App\Models\Compras;
use Illuminate\Http\Request;

class MinhasComprasController extends Controller
{
    //
    public function index(){
        $compras = Compras::where('pessoa_id', auth()->user()->pessoa->id)->get();

        //VERIFICAR COMPRAS
        $compras_verificar = Compras::where('pessoa_id', auth()->user()->pessoa->id)->where('status_compra', 'active')->get();
        $pargarme = PagarmeController::pagarme();
//        dd($compras_verificar);

        foreach ($compras_verificar as $verificar) {
            $status_compra = $pargarme->paymentLinks()->get([
                'id' => $verificar->pagarme_id
            ]);
          /*  dd($status_compra);*/
        }

        return view('paciente.minhas_compras', [
            'compras' => $compras,
        ]);
    }
}
