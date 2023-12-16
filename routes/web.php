<?php

use App\Http\Controllers\FuncionController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\SillaController;
use App\Http\Controllers\TeatroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('teatros', TeatroController::class)->names([
    'index' => 'teatros.index'
]);

Route::get('salas/bind/{id}', [SalaController::class, 'index'])->name('salas.bind');
Route::get('salas/create/{id}', [SalaController::class, 'create'])->name('salas.tecreate');
Route::resource('salas', SalaController::class);

Route::get('sillas/bind/{id}', [SillaController::class, 'index'])->name('sillas.bind');
Route::get('sillas/create/{id}', [SillaController::class, 'create'])->name('sillas.porsala.create');
Route::resource('sillas', SillaController::class);


Route::resource('peliculas', PeliculaController::class);
Route::resource('funcions', FuncionController::class);
