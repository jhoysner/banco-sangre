<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonanteController;

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
    return redirect()->route('login');

});



Route::middleware(['auth'])->group(function () {

   
    Route::resource('/users', UserController::class)->names('users');
    Route::post('users-delete', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
    Route::resource('/donante', DonanteController::class)->names('donante');
    Route::post('donante-delete', [App\Http\Controllers\DonanteController::class, 'delete'])->name('donante.delete');

    Route::get('donante-historia/{id}', [App\Http\Controllers\DonanteController::class, 'historia'])->name('donante.historia');

    Route::get('donante-serologico/{id}', [App\Http\Controllers\DonanteController::class, 'serologico'])->name('donante.serologico');
    
    Route::get('donante-historia/{id}/{donante}', [App\Http\Controllers\DonanteController::class, 'historiaShow'])->name('donante.show.historia');
    Route::post('donante-historia/{id}', [App\Http\Controllers\DonanteController::class, 'historiaStore'])->name('donante.historia.store');
    Route::get('donante-historia-historial/{id}', [App\Http\Controllers\DonanteController::class, 'showHistoria'])->name('donante.historia.historial');
    
    Route::get('donante-serologico/{id}/{donante}', [App\Http\Controllers\DonanteController::class, 'serologicoShow'])->name('donante.show.serologico');
    Route::post('donante-serologico/{id}', [App\Http\Controllers\DonanteController::class, 'serologicoStore'])->name('donante.serologico.store');
    Route::get('donante-serologico-historial/{id}', [App\Http\Controllers\DonanteController::class, 'showSerologico'])->name('donante.serologico.historial');
    
    Route::get('aprobacion', [App\Http\Controllers\UserController::class, 'aprobacion'])->name('aprobacion.index');

    Route::post('aprobacion', [App\Http\Controllers\UserController::class, 'aprobacion'])->name('aprobacion.index');
    Route::post('aprobacion-store', [App\Http\Controllers\UserController::class, 'aprobacionStore'])->name('aprobacion.store');


    Route::get('prueba', [App\Http\Controllers\UserController::class, 'prueba'])->name('pruebas.index');
    Route::post('prueba', [App\Http\Controllers\UserController::class, 'prueba'])->name('pruebas.index');
    Route::post('prueba-store/{id}', [App\Http\Controllers\UserController::class, 'pruebaStore'])->name('pruebas.store');
    
    Route::get('consultar', [App\Http\Controllers\DonanteController::class, 'consultar'])->name('consultar.index');
    Route::post('consultar', [App\Http\Controllers\DonanteController::class, 'consultar'])->name('consultar.index');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
