<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/tasks', [TaskController::class, 'store']);

// Rota para listar todas as tarefas
Route::get('/tasks', [TaskController::class, 'index']);

// Rota para atualizar o status de uma tarefa
Route::patch('/tasks/{id}', [TaskController::class, 'update']);

// Rota para deletar uma tarefa
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
