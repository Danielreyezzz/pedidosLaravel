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

Route::get('welcome', [OrdersController::class, 'getAllOrders']);

Route::put('welcome/{id?}', [OrdersController::class, 'actualizar']) -> name('order.actualizar');

Route::get('finalizado', [OrdersController::class, 'getFinishedOrders']);


