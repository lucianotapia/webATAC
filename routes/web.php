<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReuniaoController;
use App\Http\Controllers\ColegiadoController;
use App\Http\Controllers\MembroController;

use App\Http\Controllers\PessoaController;

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
    return view('home');
});

Route::get('/reuniao', [ReuniaoController::class, 'index']);
Route::get('/reuniao/create', [ReuniaoController::class, 'create']);
Route::get('/reuniao/{CodReuniao}/edit', [ReuniaoController::class, 'edit']);
Route::post('/reuniao', [ReuniaoController::class, 'store']);
Route::patch('/reuniao/{CodReuniao}', [ReuniaoController::class, 'update']);
Route::delete('/reuniao/{CodReuniao}', [ReuniaoController::class, 'destroy']);

Route::get('/download/{file}', [ReuniaoController::class, 'download']);
//Route::get('/reuniao/deletefile/{file}', [ReuniaoController::class, 'deletaArquivo']);
Route::post('/reuniao/deletefile', [ReuniaoController::class, 'deletaArquivo']);

Route::get('/colegiado', [ColegiadoController::class, 'index']);
Route::get('/colegiado/create', [ColegiadoController::class, 'create']);
Route::post('/colegiado', [ColegiadoController::class, 'store']);
Route::get('/colegiado/{CodColegiado}/edit', [ColegiadoController::class, 'edit']);
Route::patch('/colegiado/{CodColegiado}', [ColegiadoController::class, 'update']);
Route::delete('/colegiado/{CodColegiado}', [ColegiadoController::class, 'destroy']);

Route::get('/membro', [MembroController::class, 'index']);
Route::get('/membro/create', [MembroController::class, 'create']);
Route::post('/membro', [MembroController::class, 'store']);
Route::get('/membro/{CodMembro}/edit', [MembroController::class, 'edit']);
Route::patch('/membro/{CodMembro}', [MembroController::class, 'update']);
Route::delete('/membro/{CodMembro}', [MembroController::class, 'destroy']);

Route::get('/convocar-membro/{CodReuniao}', [ReuniaoController::class, 'convocar']);

Route::get('/encontrar_pessoa',[PessoaController::class, 'encontrar_pessoa'])->name('encontrar_pessoa');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');    
});