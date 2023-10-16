<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/graficaPie', [ChartController::class, 'pieChart']);
// Route::get('/g', function() {
//     return view('grafica');
// });

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('iniciar');

// Route::get('/inicio', function () {
//     return view('inicio');
// });
// Route::get('/grafica', [ChartController::class, 'index'])->name('chart.inicio');
//Route::get('/grafica-pastel', [ChartController::class, 'pieChart']);


Route::post('/validar_registro', [LoginController::class, 'registro'])->name('validar_registro');

Route::prefix('contactos')->group(function(){
    Route::get('/inicio', [CrudController::class, 'index'])->middleware('auth')->name('contactos.inicio');
    Route::get('/agregar', [CrudController::class, 'create'])->name('contactos.create');
    Route::post('/guardar', [CrudController::class, 'store'])->name('contactos.store');
    Route::get('/editar/{id}', [CrudController::class, 'edit'])->name('contactos.edit');
    Route::put('/actualizar/{id}', [CrudController::class, 'update'])->name('contactos.update');
    Route::get('/eliminar/{id}', [CrudController::class, 'show'])->name('contactos.show');
    Route::delete('/destruir/{id}', [CrudController::class, 'destroy'])->name('contactos.destroy');
    
});

Route::prefix('categoria')->group(function(){
    Route::get('/inicio', [CategoriaController::class, 'index'])->name('categoria.inicio');
    Route::get('/agregar', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/guardar', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/editar/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/actualizar/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::get('/eliminar/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::delete('/destruir/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
});