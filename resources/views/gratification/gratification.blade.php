@extends('layouts.user_type.auth')

@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Bonificações</h5>
                            </div>
                            <a href="add-gratification" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nova Bonificação</a>
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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pontos
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gratification as $gratification)
                                <tr>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$gratification->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$gratification->description}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$gratification->realizationPoints}}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('edit-gratification',['id' => $gratification->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Bonificação">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="{{route('delete-gratification',['id' => $gratification->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Deletar Bonificação">
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                        </a>
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
