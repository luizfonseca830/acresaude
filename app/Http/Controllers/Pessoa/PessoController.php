<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoController extends Controller
{
    //
    public function show(Request $request){
        $pessoa = Pessoa::where('id', $request->pessoa_id)->first();
        return response()->json($pessoa);
    }
}
