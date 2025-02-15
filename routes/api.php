<?php

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;


Route::prefix('mascotas')->group(function () {
    Route::get('/', [MascotaController::class, 'index']);  // Mostrar todas las mascotas
    Route::get('{id}', [MascotaController::class, 'show']); // Mostrar una mascota específica
    Route::post('/', [MascotaController::class, 'store']); // Crear una nueva mascota
    Route::put('{id}', [MascotaController::class, 'update']); // Actualizar una mascota
    Route::delete('{id}', [MascotaController::class, 'destroy']); // Eliminar una mascota
    Route::get('trashed', [MascotaController::class, 'indexWithTrashed']); // Obtener mascotas eliminadas
    Route::post('{id}/restore', [MascotaController::class, 'restore']); // Restaurar mascota eliminada
});
