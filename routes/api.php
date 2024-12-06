<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoriasController,ProductosController,HistorialVentaController};


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/categorias', CategoriasController::class);

Route::apiResource('/productos', ProductosController::class);
Route::apiResource('/historial_ventas', HistorialVentaController::class);
Route::apiResource('/historial_ventas', HistorialVentaController::class);
