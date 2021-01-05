<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['App\Http\Controllers\WeelcomeController', 'index']);
Route::get('inicio', [\App\Http\Controllers\WeelcomeController::class, 'index'])->name('inicio');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    //SAIR
    Route::post('/sair', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('sair');

    Route::get('/minhascompras', [\App\Http\Controllers\Pessoa\MinhasComprasController::class, 'index'])->name('minhascompras.index');

//    MEDICO AGENDA
    Route::get('/agenda', [\App\Http\Controllers\Medico\AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/load-agenda', [\App\Http\Controllers\Medico\AgendaController::class, 'loadAgenda'])->name('routeLoadAgenda');
    Route::post('/agenda/store', [\App\Http\Controllers\Medico\AgendaController::class, 'store'])->name('agenda.store');

    //PACIENTE AGENDA
    Route::match(['get', 'post'],'/agenda/consulta/{id}', [\App\Http\Controllers\Paciente\AgendaConsultaController::class, 'index'])->name('paciente.agenda.index');
    Route::post('/ajax/busca', [\App\Http\Controllers\Paciente\AgendaConsultaController::class, 'show'])->name('paciente.agenda.ajax');
    Route::match(['get', 'post'],'/consulta/marca/{compra_id}', [\App\Http\Controllers\Paciente\AgendaConsultaController::class, 'marcaConsulta'])->name('paciente.maracaConsulta');

    //PACIENTE CONSULTA
    Route::get('/paciente/minhasconsultas', [\App\Http\Controllers\Paciente\MinhasConsultasController::class, 'index'])->name('paciente.consultas.index');

    //MEDICO CONSULTA
    Route::get('/medico/minhasconsultas', [\App\Http\Controllers\Medico\MinhasConsultasController::class, 'index'])->name('medico.consultas.index');
    Route::get('/medico/consulta/criar/{consulta_id}', [\App\Http\Controllers\Medico\MinhasConsultasController::class, 'update'])->name('medico.consultas.update');
    Route::match(['get', 'post'], 'medico/consulta/salvarprontuario/{consulta_id}', [\App\Http\Controllers\Medico\ProntuarioController::class, 'salvaProntuario'])->name('medico.consulta.salvaProntuario');
    Route::get('/medico/salva/{id}', [\App\Http\Controllers\Medico\ProntuarioController::class, 'store'])->name('medico.salva');
    //CARREGAR SALA
    Route::get('/carregarsala', [\App\Http\Controllers\Atendimento\AtendimentoController::class, 'index'])->name('atendimento.index');
    //CARREGAR SALA PACIENTE
    Route::get('/paciente/carregarsala/{id}', [\App\Http\Controllers\Paciente\MinhasConsultasController::class, 'entrarNaSala'])->name('paciente.carregarsala');
    //FINALIZAR SALA PACIENTE
    Route::post('/paciente/finalizar', [\App\Http\Controllers\Medico\MinhasConsultasController::class, 'finalizarConsulta'])->name('paciente.finalizarConsulta');

    //DASHBOARD
    Route::group(['middleware' => ['adminverified']], function () {
        Route::get('/home/dashboard', [\App\Http\Controllers\DashBoard\HomeController::class, 'index'])->name('home.dashboard');
        Route::get('/dashboard/lista', [\App\Http\Controllers\DashBoard\Lista\UsuarioController::class, 'index'])->name('lista.usuario.dashboard');

        //Especilidade
        Route::get('/dashboard/especialidade', [\App\Http\Controllers\DashBoard\Cadastros\EspecialidadeController::class, 'index'])->name('especialidade.create.dashboard');
        Route::post('/dashboard/especialidade', [\App\Http\Controllers\DashBoard\Cadastros\EspecialidadeController::class, 'store'])->name('especialidade.store.dashboard');
        Route::get('/dashboard/especialidade/lista', [\App\Http\Controllers\DashBoard\Lista\EspecialidadeController::class, 'index'])->name('especialidade.list.dashboard');
        //Solicitacao
        Route::get('/dashboard/solicitacao/medico', [\App\Http\Controllers\DashBoard\Solicitacao\MedicoController::class, 'index'])->name('solicitacao.medico.dashboard');
        Route::get('/dash/board/solicitacao/medicoa/aceita/{id}', [\App\Http\Controllers\DashBoard\Solicitacao\MedicoController::class, 'aceitar'])->name('solicitacao.medico.aceitar.dashboard');

    });
});

//SERVICOS
Route::get('/servico/consulta', [\App\Http\Controllers\Consultas\ConsultasController::class, 'index'])->name('consulta.index');


//SOLICITACAO
Route::get('/servico/solicitacao', [\App\Http\Controllers\Servico\Solicitacao\SolicitacaoController::class, 'index'])->name('solicitacao.index');
Route::post('/servico/solicitacao/pedido', [\App\Http\Controllers\Servico\Solicitacao\SolicitacaoController::class, 'store'])->name('solicitacao.store');
