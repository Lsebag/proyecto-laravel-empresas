<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmpresaController;
use \App\Http\Controllers\ProductoController;
use \App\Http\Controllers\AlumnoController;
use App\Http\Controllers\IdiomaController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('main','main');

Route::get("idiomas/paginate",[IdiomaController::class,"get_paginate"]);

Route::get("empresas/paginate",[EmpresaController::class,"get_paginate"]);

Route::resource("empresas",EmpresaController::class);
// Aquí mismo estoy definiendo cuál es el nombre de mi recurso
Route::resource("products",ProductoController::class);

Route::resource("alumnos",AlumnoController::class);

Route::resource("idiomas",IdiomaController::class);

Route::view('aprendiendo_vue','aprendiendo_vue');


