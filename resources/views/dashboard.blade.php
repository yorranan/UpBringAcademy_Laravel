<!DOCTYPE html>
<head>
  <title>Menu</title>
</head>

<a href="{{ route('logout') }}">Logout</a>
<a href="{{ route('createTask') }}">NewTask</a>

<table>
  <thead>
      <tr>
          <th>Nome do Usuário</th>
          <th>Nome da Tarefa</th>
          <th>Descrição da Tarefa</th>
      </tr>
  </thead>
  <tbody>
      @foreach($tasks as $task)
          <tr>
              <td>{{ $task->user_name }}</td>
              <td>{{ $task->task_name }}</td>
              <td>{{ $task->description }}</td>
          </tr>
      @endforeach
  </tbody>
</table>

  