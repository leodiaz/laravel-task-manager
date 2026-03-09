<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json($task);
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);

        $task->completed = true;
        $task->save();

        return response()->json($task);
    }

    public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return response()->json([
        'message' => 'Task eliminada',
        'id' => $id
    ]);
}
}
