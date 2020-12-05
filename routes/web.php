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

Route::get('/', function () {
    return view('welcome');
});
Route::get('inicio', [\App\Http\Controllers\WeelcomeController::class, 'index'])->name('inicio');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/atendimento', [\App\Http\Controllers\Metting\MettingController::class, 'index'])->name('atendimento.index');
    Route::get('/atendimento/{id}', [\App\Http\Controllers\Metting\MettingController::class, 'show'])->name('atendimento.show');

    Route::get('/loja', [\App\Http\Controllers\Loja\LojaController::class, 'index'])->name('loja.index');
    Route::post('/loja/store', [\App\Http\Controllers\Loja\LojaController::class, 'store'])->name('loja.store');
    Route::get('/minhascompras', [\App\Http\Controllers\Pessoa\MinhasComprasController::class, 'index'])->name('minhascompras.index');

//    MEDICO
    Route::get('/agenda', [\App\Http\Controllers\Medico\AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/load-agenda', [\App\Http\Controllers\Medico\AgendaController::class, 'loadAgenda'])->name('routeLoadAgenda');
});
