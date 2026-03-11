<h2>Editar tarea</h2>

<form action="/tasks/{{ $task->id }}/update" method="POST">
    @csrf

    <input type="text" name="title" value="{{ $task->title }}">

    <br><br>

    <textarea name="description">{{ $task->description }}</textarea>

    <br><br>

    <button type="submit">Guardar cambios</button>
</form>