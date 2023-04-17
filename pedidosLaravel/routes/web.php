<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
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


Route::view('/login', 'login')->name('login');

Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');

Route::view('/registro', 'registro')->name('registro');

Route::post('/validar-registro', [LoginController::class, 'registro'])->name('validar-registro');

Route::post('/validar-contra', [LoginController::class, 'contra'])->name('contra');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'verificarAutenticacion'], function () {

    Route::get('welcome', [PedidosController::class, 'getAllOrders'])->name('welcome');

    Route::put('detalle/{id}', [PedidosController::class, 'actualizar']) -> name('order.actualizar');

    Route::get('finalizado', [PedidosController::class, 'getFinishedOrders']);

    Route::get('detalle/{id}', [PedidosController::class, 'buscar']) -> name('detalle');

    Route::get('detalleFin/{id?}', [PedidosController::class, 'buscarFin']) -> name('detalleFin');

    Route::get('panelusuario', [UsuariosController::class, 'getData'])->name('panelusuario');

    Route::get('welcome', [PedidosController::class, 'infpedidos'])->name('welcome');
});



