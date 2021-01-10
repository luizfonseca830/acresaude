<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroReqeust;
use App\Http\Requests\RegistroRequest;
use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    //
    public function store(RegistroRequest  $request){

        $usuario = User::create([
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $pessoa = Pessoa::create([
            'user_id' => $usuario->id,
            'tipo_usuario_id' => 3,
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cpf' => $request->cpf,
            'cnpj' => $request->cnpj,
            'data_nascimento' => $request->data_nascimento,
        ]);

        $endereco = Endereco::create([
            'pessoa_id' => $pessoa->id,
            'cep' => $request->cep,
            'uf' => $request->uf,
            'bairro' => $request->bairro,
            'municipio' => $request->municipio,
            'complemento' => $request->complemento,
            'endereco' => $request->endereco,
        ]);

        if (!is_null($endereco)) {
            session()->put('sucess', 'Registrado com sucesso.');
            Auth::attempt(['email' => $usuario->email, 'password' => $usuario->password]);
            Auth::guard()->login($usuario);
        }
        else {
            session()->put('error', 'Ops, algo de errado aconteceu, tente novamente.');
        }
        return redirect()->route('inicio');
    }
}
