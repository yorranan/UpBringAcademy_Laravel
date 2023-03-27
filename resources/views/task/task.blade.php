@extends('layouts.user_type.auth')
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <label><h5 class="mb-0">Tarefas</h5></label>
                            @if(auth()->user()->admin)
                            <a href="{{route('add-task')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nova Tarefa</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nome
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Descrição
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Inicio
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Fim
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pontos
                                    </th>
                                    @if(!auth()->user()->admin)
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($task as $task)
                                <tr>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$task->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$task->description}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$task->beginDateTime}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$task->endDateTime}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$task->points_realization}}</p>
                                    </td>
                                    <td class="text-center">
                                        @if(auth()->user()->admin)
                                        <a href="{{route('edit-task',['id' => $task->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Tarefa">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="{{route('delete-task',['id' => $task->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Deletar Tarefa">
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                        </a>
                                        @else
                                            @if($task->status)
                                                <p class="text-xs font-weight-bold mb-0">concluido</p>
                                            @else
                                                @if(\Carbon\Carbon::parse($task->endDateTime)->isPast())
                                                    <p class="text-xs font-weight-bold mb-0">atrasada</p>
                                                @else
                                                    <p class="text-xs font-weight-bold mb-0">aberta</p>
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
