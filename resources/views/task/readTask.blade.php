<!DOCTYPE html>
<head>
    <title> Editar Tarefa </title>
</head>
<body>
    <a href="{{ route('dashboard') }}">Voltar</a>
    <a href="{{ route('editTaskCreate', ['id' => $task->id]) }}">editar</a>
    <h1>{{ $task->name }}</h1>
</body>
