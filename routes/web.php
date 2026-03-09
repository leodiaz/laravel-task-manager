<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);

Route::get('/create-task', function () {

    \App\Models\Task::create([
        'title' => 'Mi primera tarea',
        'description' => 'probando laravel'
    ]);

    return "Task creada";
});

Route::get('/tasks/{id}/complete', [TaskController::class, 'complete']);

Route::get('/tasks/{id}/delete', [TaskController::class, 'destroy']);