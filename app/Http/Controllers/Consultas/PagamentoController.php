<?php

namespace App\Http\Controllers\Consultas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Servicos\PagarmeController;
use App\Http\Requests\Servico\PagamentoRequest;
use App\Models\AgendaConsultas;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PagarMe\Client;

class PagamentoController extends Controller
{
    private $pagarme;

    public function __construct()
    {
        $this->pagarme = PagarmeController::pagarme();
    }

    public function pagarmentoTransação(Request $request)
    {
//        dd($request->all());

        $transacao = $this->pagarme->transactions()->capture([
            'id' => $request->dataToken,
            'amount' => $request->price
        ]);

        $compra = Compras::create([
            'pessoa_id' => auth()->user()->pessoa->id,
            'pagarme_id' => $transacao->id,
            'status_compra' => $transacao->status,
        ]);
//        $transacao->items[0]->id

        $agenda_consulta = AgendaConsultas::findOrFail($transacao->items[0]->id);
        $agenda_consulta->update([
            'paciente_id' => auth()->user()->pessoa->id,
            'compra_id' => $compra->id,
            'status_reserva' => '1'
        ]);

        session()->put('sucess', 'Compra realiza com sucesso, verifica sua lista de compras para mais detalhes.');
        return redirect()->route('inicio');
    }

    //Recebendo os dados para pagamento
    public function pagamento(Request $request)
    {
        dd($request->all());
//        $produto = AgendaConsultas::findOrFail($id);
//        dd($produto->agendaMedico->medicoEspecialidade->especialidade->especialidade);
//        $preco = str_replace(',', '', $produto->agendaMedico->preco);
//        dd($preco);
//        1000 = 10 DE ACORDO COM A PARGME
//        $paymentLink = $this->pagarme->paymentLinks()->create([
//            'amount' => $preco,
//            'items' => [
//                [
//                    'id' => '1',
//                    'title' => "Consulta: " . $produto->agendaMedico->medicoEspecialidade->especialidade->especialidade,
//                    'unit_price' => $preco,
//                    'quantity' => 1,
//                    'tangible' => false,
//                    'category' => 'Consulta',
//                ],
//            ],
//            'payment_config' => [
//                'boleto' => [
//                    'enabled' => true,
//                    'expires_in' => 3
//                ],
//                'credit_card' => [
//                    'enabled' => true,
//                    'free_installments' => 3,
//                    'interest_rate' => 5,
//                    'max_installments' => 12
//                ],
//                'default_payment_method' => 'boleto'
//            ],
//            'max_orders' => 1,
//            'expires_in' => 3600
//        ]);
//        return $paymentLink;
    }
}
