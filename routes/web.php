<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/usuarios', [App\Http\Controllers\Usuarios\UsuarioController::class, 'index'])->name('usuarios');
    Route::get('/usuarios-dashboard', [App\Http\Controllers\Usuarios\UsuarioController::class, 'dashboard']);
    Route::get('/tareas', [App\Http\Controllers\Tareas\TareasController::class, 'index'])->name('tareas');
    Route::get('/tareas-dashboard', [App\Http\Controllers\Tareas\TareasController::class, 'dashboard']);
    Route::get('/tarea-borrar/{id}', [App\Http\Controllers\Tareas\TareasController::class, 'borrar'])->name('tarea-borrar');
    Route::get('/tarea-completar/{id}', [App\Http\Controllers\Tareas\TareasController::class, 'completar'])->name('tarea-completar');
    Route::get('/tarea-registrar', [App\Http\Controllers\Tareas\TareasController::class, 'registrar'])->name('tarea-registrar');
    Route::post('/tarea-guardar', [App\Http\Controllers\Tareas\TareasController::class, 'guardar'])->name('tarea-guardar');
});


Route::group(['middleware' => ['admin']], function () {
    Route::get('/tarea-completada', [App\Http\Controllers\Tareas\TareasController::class, 'completadas'])->name('tarea-completada');
});
