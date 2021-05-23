<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DashBoard\Solicitacao\MedicoController;
use \App\Http\Controllers\DashBoard\Cadastros\EspecialidadeController;
use \App\Http\Controllers\DashBoard\Lista\UsuarioController;
use \App\Http\Controllers\Consultas\ConsultasController;
use \App\Http\Controllers\Medico\AgendaController;
use \App\Http\Controllers\Servico\Solicitacao\SolicitacaoController;

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
//NEW ROTA REGISTRO
Route::post('/registro', [\App\Http\Controllers\Pessoa\RegistroController::class, 'store'])->name('registro');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    //SAIR
    Route::post('/sair', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('sair');

    Route::get('/minhascompras', [\App\Http\Controllers\Pessoa\MinhasComprasController::class, 'index'])->name('minhascompras.index');

//    MEDICO AGENDA
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/load-agenda', [AgendaController::class, 'loadAgenda'])->name('routeLoadAgenda');
    Route::post('/agenda-store', [AgendaController::class, 'store'])->name('routeStoreAgenda');
    Route::put('/agenda-update', [AgendaController::class, 'update'])->name('routeUpdateAgenda');
    Route::post('/agenda-info', [AgendaController::class, 'show'])->name('routeInfoAgenda');
    Route::put('/agenda-eventDropUpdate', [AgendaController::class, 'eventDropUpdate'])->name('routeDropUpdateAgenda');
    Route::put('/agenda-event-delete', [AgendaController::class, 'delete'])->name('routeDeleteAgenda');

    //PACIENTE AGENDA
    Route::match(['get', 'post'], '/agenda/consulta/{id}', [\App\Http\Controllers\Paciente\AgendaConsultaController::class, 'index'])->name('paciente.agenda.index');
    Route::post('/ajax/busca', [\App\Http\Controllers\Paciente\AgendaConsultaController::class, 'show'])->name('paciente.agenda.ajax');
    Route::match(['get', 'post'], '/consulta/marca/{compra_id}', [\App\Http\Controllers\Paciente\AgendaConsultaController::class, 'marcaConsulta'])->name('paciente.maracaConsulta');

    //PACIENTE CONSULTA
    Route::get('/paciente/minhasconsultas', [\App\Http\Controllers\Paciente\MinhasConsultasController::class, 'index'])->name('paciente.consultas.index');

    //MEDICO CONSULTA
    Route::get('/medico/consulta/delete/{id}', [AgendaController::class, 'deleteUnique'])->name('medico.consulta.delete.unico');
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


        //Especialidade
        Route::get('/dashboard/especialidade/novo', [EspecialidadeController::class, 'index'])->name('especialidade.create.dashboard');
        Route::post('/dashboard/especialidade/salvar', [EspecialidadeController::class, 'store'])->name('especialidade.store.dashboard');
        Route::get('/dashboard/especialidade/lista', [EspecialidadeController::class, 'index'])->name('especialidade.list.dashboard');
        Route::get('/dashboard/especialidade/editar/{id}', [EspecialidadeController::class, 'edit'])->name('especialidade.edit.dashboard');
        Route::get('/dashboard/especialidade/deletar/{id}', [EspecialidadeController::class, 'destroy'])->name('especialidade.destroy.dashboard');
        Route::match(['get', 'post'], '/dashboard/especialidade/update/{id}', [EspecialidadeController::class, 'update'])->name('especialidade.update.dashboard');

        //Usuário
        Route::get('/dashboard/usuario/lista', [UsuarioController::class, 'index'])->name('usuario.lista.dashboard');
        Route::get('/dashboard/usuario/editar/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit.dashboard');
        Route::get('/dashboard/usuario/deletar/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy.dashboard');
        Route::match(['get', 'post'], '/dashboard/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update.dashboard');


        //Solicitacao
        Route::get('/dashboard/solicitacao/medico', [MedicoController::class, 'index'])->name('solicitacao.medico.dashboard');
        Route::get('/dash/board/solicitacao/medicoa/aceita/{id}', [MedicoController::class, 'aceitar'])->name('solicitacao.medico.aceitar.dashboard');
        Route::get('/dash/board/solicitacao/medicoa/rejeitar/{id}', [MedicoController::class, 'rejeitar'])->name('solicitacao.medico.rejeitar.dashboard');
        Route::get('/dashboard/solicitacao/medico/visualizar/{id}', [MedicoController::class, 'visualizarMedico'])->name('solicitacao.medico.visualizar.dashboard');
    });

    //CONSULTA PAGAMENTO
    Route::post('servico/consulta/pagamento', [ConsultasController::class, 'indexPagamento'])->name('consulta.pagamento');
    //REALIZAR PAGAMENTO
    Route::post('servico/realizar/pagamento', [ConsultasController::class, 'solicitationPayment'])->name('realizar.pagamento');
    Route::post('agenda/ajax/consulta/preco/', [\App\Http\Controllers\Consultas\ConsultasAjaxController::class, 'price'])->name('consulta.price');
    Route::post('/pagamento/transacao', [\App\Http\Controllers\Consultas\PagamentoController::class, 'pagarmentoTransação'])->name('pagamento.transação');
    Route::get('/confirmacao/transacao/emial/{trasacao}', [\App\Http\Controllers\Email\EmailController::class, 'index'])->name('email.transacao');
});

//SERVICOS
Route::get('/servico/consulta', [ConsultasController::class, 'index'])->name('consulta.index');
Route::get('/servico/consulta/{id}', [ConsultasController::class, 'show'])->name('consulta.mostra');


//SERVICO SOLICITACAO AJAX
Route::post('/servico/consulta/ajax', [\App\Http\Controllers\Consultas\ConsultasAjaxController::class, 'search'])->name('consulta.ajax.search');
Route::post('/servico/consulta/medico/horario/ajax', [\App\Http\Controllers\Consultas\ConsultasAjaxController::class, 'searchMedicoHorario'])->name('consulta.ajax.searchMedicoHorario');

//SOLICITACAO
Route::get('/servico/solicitacao', [SolicitacaoController::class, 'index'])->name('solicitacao.index');
Route::post('/servico/solicitacao/pedido', [SolicitacaoController::class, 'store'])->name('solicitacao.store');


