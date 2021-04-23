<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReuniaoController;
use App\Http\Controllers\ColegiadoController;
use App\Http\Controllers\MembroController;

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
    return view('teste');
});



Route::get('/reuniao', [ReuniaoController::class, 'index']);
Route::get('/reuniao/{Codigo}/edit', [ReuniaoController::class, 'edit']);

Route::get('/colegiado', [ColegiadoController::class, 'index']);
Route::get('/colegiado/create', [ColegiadoController::class, 'create']);
Route::post('/colegiado', [ColegiadoController::class, 'store']);
Route::get('/colegiado/{CodColegiado}/edit', [ColegiadoController::class, 'edit']);
Route::patch('/colegiado/{CodColegiado}', [ColegiadoController::class, 'update']);
Route::delete('/colegiado/{CodColegiado}', [ColegiadoController::class, 'destroy']);

Route::get('/membro', [MembroController::class, 'index']);