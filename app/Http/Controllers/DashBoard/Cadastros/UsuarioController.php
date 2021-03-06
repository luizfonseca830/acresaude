<?php

namespace App\Http\Controllers\DashBoard\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioResquest;
use App\Models\Pessoa;
use App\Models\User;
use App\Models\Usuario;
use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('dashboard.usuario.editar', ['usuario' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioResquest $request, $id)
    {
        //
        $users = User::findOrFail($id);

        $users->update([
            'email' => ($request->email),
        ]);

        session()->put('sucess', 'Usuário editado com sucesso!');
        return redirect()->route('usuario.lista.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);

        if ($users->delete()) {
            session()->pull('sucess', 'Usuário deletada com sucesso');
        } else {
            session()->put('error', 'Esse usuário não pode ser deletado!');
        }
        return redirect()->route('usuario.lista.dashboard');
    }
}
