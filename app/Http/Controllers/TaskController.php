<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,completed',
        ]);

        // Criar a tarefa
        $task = Task::create($validated);

        // Responder com sucesso
        return response()->json([
            'message' => 'Tarefa criada com sucesso!',
            'task' => $task,
        ], 201);
    }

    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'message' => 'Lista de tarefas',
            'tasks' => $tasks,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed',
        ]);

        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }

        $task->status = $request->input('status');
        $task->save();

        return response()->json([
            'message' => 'Status atualizado com sucesso',
            'task' => $task,
        ]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Tarefa deletada com sucesso']);
    }


}



