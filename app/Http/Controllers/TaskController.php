<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('completed')->get();

        $pendingTasks = Task::where('completed', false)->count();

        return view('tasks.index', compact('tasks', 'pendingTasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('/tasks')->with('success', 'Tarea creada correctamente');
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);

        $task->completed = true;
        $task->save();

        return redirect('/tasks')->with('success', 'Tarea marcada como completada');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
            ]);

        $task = Task::findOrFail($id);

        $task->update($request->only(['title','description']));

        return redirect('/tasks')->with('success', 'Tarea actualizada');
    }

        public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('deleted', 'Tarea eliminada');
    }
}
