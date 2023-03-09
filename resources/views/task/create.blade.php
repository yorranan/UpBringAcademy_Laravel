<!DOCTYPE html>
<head>
    <title>New Task</title>
</head>

<p>Criando um tarefa uau!</p>

<form action="{{ route('taskCreateTask') }}" method="post">
    @csrf
    <h1><input type="text" id="name" name="name" placeholder="Nome"></h1>
    <h1><input type="datetime-local" id="beginDateTime" name="beginDateTime" placeholder="Data Inicial"></h1>
    <h1><input type="datetime-local" id="endDateTime" name="endDateTime" placeholder="Data Final"></h1>
    <h1><input type="text" id="description" name="description" placeholder="Descricao"></h1>
    <h1><input type="number" id="points_realization" name="points_realization" placeholder="Pontos"></h1 >
    <h1><button type="submit">é um botão</button></h1>
</form>