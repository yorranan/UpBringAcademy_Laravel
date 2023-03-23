<!DOCTYPE html>
<head>
    <title>Editando</title>
</head>

<body>
    <a href="{{ route('readTaskCreate', ['id' => $task->id]) }}">Voltar</a>

    <a href="{{ route('editTaskDelete', ['id' => $task->id]) }}">Deletar</a>

    <p>Editando uma tarefa uau!</p>

    <form action="{{ route('editTaskStore', ['id' => $task->id]) }}" method="post">
        @csrf
        <h1><input type="text" id="name" name="name" placeholder="Nome" value="{{$task->name}}"></h1>
        <h1><input type="datetime-local" id="beginDateTime" name="beginDateTime" placeholder="Data Inicial" value="{{$task->beginDateTime}}"></h1>
        <h1><input type="datetime-local" id="endDateTime" name="endDateTime" placeholder="Data Final" value="{{$task->endDateTime}}"></h1>
        <h1><input type="text" id="description" name="description" placeholder="Descricao" value="{{$task->description}}"></h1>
        <h1><input type="number" id="points_realization" name="points_realization" placeholder="Pontos" value="{{$task->points_realization}}"></h1 >
        <h1><button type="submit">Editar</button></h1>
    </form>
</body>