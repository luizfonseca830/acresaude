<?php

namespace App\Http\Controllers\Consultas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Servicos\PagarmeController;
use App\Http\Requests\Servico\PagamentoRequest;
use App\Models\AgendaConsultas;
use Illuminate\Http\Request;
use PagarMe\Client;

class PagamentoController extends Controller
{
    private $pagarme;

    public function __construct()
    {
        $this->pagarme = PagarmeController::pagarme();
    }

    //Recebendo os dados para pagamento
    public function pagamento($produto)
    {
//        dd($request->all());
//        $produto = AgendaConsultas::findOrFail($id);
//        dd($produto->agendaMedico->medicoEspecialidade->especialidade->especialidade);
        $preco = str_replace(',', '', $produto->agendaMedico->preco);
//        dd($preco);
        //1000 = 10 DE ACORDO COM A PARGME
        $paymentLink = $this->pagarme->paymentLinks()->create([
            'amount' => $preco,
            'items' => [
                [
                    'id' => '1',
                    'title' => "Consulta: " . $produto->agendaMedico->medicoEspecialidade->especialidade->especialidade,
                    'unit_price' => $preco,
                    'quantity' => 1,
                    'tangible' => false,
                    'category' => 'Consulta',
                ],
            ],
            'payment_config' => [
                'boleto' => [
                    'enabled' => true,
                    'expires_in' => 3
                ],
                'credit_card' => [
                    'enabled' => true,
                    'free_installments' => 3,
                    'interest_rate' => 5,
                    'max_installments' => 12
                ],
                'default_payment_method' => 'boleto'
            ],
            'max_orders' => 1,
            'expires_in' => 3600
        ]);
        return $paymentLink;
    }
}
