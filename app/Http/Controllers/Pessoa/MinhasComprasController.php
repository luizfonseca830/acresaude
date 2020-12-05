<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\Compras;
use Illuminate\Http\Request;

class MinhasComprasController extends Controller
{
    //
    public function index(){
        $compras = Compras::where('pessoa_id', auth()->user()->pessoa->id)->get();
        return view('paciente.minhas_compras', [
            'compras' => $compras,
        ]);
    }
}
