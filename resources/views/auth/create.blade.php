<!DOCTYPE html>
<head>
    <title>New Task</title>
</head>

<p>Criando um tarefa uau!</p>

<form action="{{ route('taskCreateTask') }}" method="post">
    @csrf
    <h1><input type="text" name="name" placeholder="Nome"></h1>
    <h1><input type="datetime-local" name="beginDateTime" placeholder="Data Inicial"></h1>
    <h1><input type="datetime-local" name="endDateTime" placeholder="Data Final"></h1>
    <h1><input type="text" name="description" placeholder="Descricao"></h1>
    <h1><input type="number" name="points_realization" placeholder="Pontos"></h1 >
    <h1><button type="submit">é um botão</button></h1>
</form>