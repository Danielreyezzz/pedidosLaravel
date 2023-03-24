<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
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


Route::view('/login', 'login')->name('login');

Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');

Route::view('/registro', 'registro')->name('registro');

Route::post('/validar-registro', [LoginController::class, 'registro'])->name('validar-registro');

Route::post('/validar-contra', [LoginController::class, 'contra'])->name('contra');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'user'], function () {

    Route::get('welcome', [OrdersController::class, 'getAllOrders'])->name('welcome');

    Route::put('welcome/{id?}', [OrdersController::class, 'actualizar']) -> name('order.actualizar');

    Route::get('finalizado', [OrdersController::class, 'getFinishedOrders']);

    Route::get('detalle/{id?}', [OrdersController::class, 'buscar']) -> name('detalle');

    Route::get('detalleFin/{id?}', [OrdersController::class, 'buscarFin']) -> name('detalleFin');

    Route::get('panelusuario', [UsersController::class, 'getData'])->name('panelusuario');

});



