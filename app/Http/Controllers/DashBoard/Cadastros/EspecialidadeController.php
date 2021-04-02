<?php

namespace App\Http\Controllers\DashBoard\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\EspecialidadeRequest;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.cadastros.especialidade');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadeRequest $request)
    {
        //

        $especialidade = Especialidade::create([
            'especialidade' => $request->especialidade,
            'descricao' => $request->descricao
        ]);

        if (isset($especialidade)) {
            session()->put('sucess', 'Especialidade criada com sucesso!');
            return redirect()->route('especialidade.list.dashboard');
        }

        session()->put('error', 'Ocorreu um erro ao tentar criar especialidade!');
        return redirect()->route('especialidade.list.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadeRequest $request, $id)
    {
        //
        $especialidades = Especialidade::findOrFail($id);

        $especialidades->update([
            'nome' => quotemeta($request->nome),

        ]);

        session()->put('sucess', 'especialidade editado com sucesso!');
        return redirect()->route('especialidade.update.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidade = Especialidade::find($id);

        if ($especialidade->delete()) {
            session()->pull('sucess', 'Especialidade deletada com sucesso');
        } else {
            session()->put('error', 'Essa Especialidade não pode ser deletado!');
        }
        return redirect()->route('especialidade.list.dashboard');
    }
}
