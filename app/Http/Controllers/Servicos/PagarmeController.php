<?php

namespace App\Http\Controllers\Servicos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PagarMe\Client;

class PagarmeController extends Controller
{
    //DEVOLVER UMA TRANSACAO
    static public function pagarme(){
        $pargamer = New Client(env('API_KEY_PAGARME'));
        return $pargamer;
    }
}
