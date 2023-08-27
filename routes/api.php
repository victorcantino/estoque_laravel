<?php

use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estoques', [EstoqueController::class, 'index']);
Route::post('/estoques', [EstoqueController::class, 'store']);
Route::put('/estoques/{estoque}', [EstoqueController::class, 'update']);
Route::patch('/estoques/{estoque}', [EstoqueController::class, 'update']);
Route::delete('/estoques/{estoque}', [EstoqueController::class, 'destroy']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::put('/produtos/{produto}', [ProdutoController::class, 'update']);
Route::patch('/produtos/{produto}', [ProdutoController::class, 'update']);
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy']);
