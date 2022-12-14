<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitacaoController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('animals/buscar',[AnimalController::class,'buscar']);
Route::resource('animal',AnimalController::class);

Route::get('especies/buscar',[EspeciesController::class,'buscar']);
Route::resource('especie',EspeciesController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('visitacaos/buscar',[VisitacaoController::class,'buscar']);
Route::resource('visitacao',VisitacaoController::class);