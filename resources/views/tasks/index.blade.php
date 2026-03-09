<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>
    @if($pendingTasks)
        <h3>Tareas pendientes: {{ $pendingTasks }}</h3>
    @else
        <h3>que tengas un buen dia</h3>
    @endif

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('deleted'))
        <p style="color: red;">{{ session('deleted') }}</p>
    @endif

    <!-- Formulario para crear tareas -->
    <form action="/tasks" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Título" required>
        <textarea name="description" placeholder="Descripción"></textarea>
        <button type="submit">Crear Tarea</button>
    </form>

    <hr>

    <h2>Tareas</h2>
    <ul>
        @if($tasks->isEmpty())
        <p>No hay tareas todavía.</p>
        @endif
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> - {{ $task->description }}
                @if($task->completed)
                    ✅ Completada
                @else
                    <a href="/tasks/{{ $task->id }}/complete">Marcar como completada</a>
                @endif
                <a href="/tasks/{{ $task->id }}/delete">Eliminar</a>
            </li>
        @endforeach
    </ul>
</body>
</html>