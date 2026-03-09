<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/tasks', [TaskController::class, 'index']); // Lista tareas
Route::post('/tasks', [TaskController::class, 'store']); // Crear tarea

Route::get('/tasks/{id}/complete', [TaskController::class, 'complete']); // Completar

Route::get('/tasks/{id}/delete', [TaskController::class, 'destroy']); // Eliminar