<?php

use App\Http\Controllers\API\PedidoController;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\ReservaController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group((function(){
    Route::get('logout',[UserController::class,'logout']);

//---------------------------rutas Pedidos mobile---------------------MATIAS--------------------------//
    Route::post('pedido',[PedidoController::class,'pedido']);
//---------------------------rutas Pedidos mobile---------------------MATIAS--------------------------//


//---------------------------rutas Compras mobile---------------------MATIAS--------------------------//
    Route::get('compras',[PedidoController::class,'compras']);
//---------------------------rutas Compras mobile---------------------MATIAS--------------------------//

//---------------------------rutas Reservas mobile---------------------MATIAS--------------------------//
Route::get('reservas',[ReservaController::class,'reservas']);

Route::get('horarios',[ReservaController::class,'horarios']);

Route::post('reservacreate',[ReservaController::class,'reservacreate']);
//---------------------------rutas Reservas mobile---------------------MATIAS--------------------------//
}));
    


//---------------------------rutas Login mobile---------------------MATIAS--------------------------//
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
//---------------------------rutas Login mobile---------------------MATIAS--------------------------//


//---------------------------rutas Productos mobile---------------------MATIAS--------------------------//
Route::get('productos',[ProductoController::class,'productos']);
//---------------------------rutas Productos mobile---------------------MATIAS--------------------------//



