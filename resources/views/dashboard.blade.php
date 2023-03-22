<!DOCTYPE html>
<head>
  <title>Menu</title>
</head>

<a href="{{ route('logout') }}">Logout</a>
<a href="{{ route('createTask') }}">NewTask</a>
<a href="{{ route('profile') }}">{{$user->name}}</a>

<table>
  <thead>
      <tr>
          <th>Nome da Tarefa</th>
          <th>Descrição da Tarefa</th>
      </tr>
  </thead>
  <tbody>
      @foreach($tasks as $tasks)
          <tr>
              <td><a href="{{ route('readTaskCreate', ['id' => $tasks->task_id]) }}">{{ $tasks->task_name }}    </a></td>
              <td>{{ $tasks->description }}</td>
          </tr>
      @endforeach
  </tbody>
</table>  