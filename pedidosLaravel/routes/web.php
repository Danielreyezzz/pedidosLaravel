<?php

use App\Http\Controllers\OrdersController;
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

Route::get('welcome', [OrdersController::class, 'getAllOrders'])->middleware(['auth', 'isAdmin']);

Route::put('welcome/{id?}', [OrdersController::class, 'actualizar']) -> name('order.actualizar');

Route::get('finalizado', [OrdersController::class, 'getFinishedOrders']);

Route::get('detalle/{id?}', [OrdersController::class, 'buscar']) -> name('detalle');

Route::get('login',function(){
    return view('login');
});

Route::get('panelusuario',function(){
    return view('panelusuario');
});




