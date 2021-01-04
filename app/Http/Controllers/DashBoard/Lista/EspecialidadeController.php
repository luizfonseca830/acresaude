<?php

namespace App\Http\Controllers\DashBoard\Lista;

use App\Http\Controllers\Controller;
use App\Models\Especilidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    //
    public function index(){
        $especialidades = Especilidade::all();
        return view('dashboard.especialidade.lista', [
            'especialidades' => $especialidades,
        ]);
    }
}
