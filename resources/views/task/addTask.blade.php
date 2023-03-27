@extends('layouts.user_type.auth')
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                      <form role="form" method="POST" action="task-store">
                        <div><h5>Criar Tarefa</h5></div>
                        <div class="d-flex flex-row justify-content-between">
                            @csrf
                            
                            <div class="mb-3">
                              <label>Nome</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Nome" aria-label="Nome" aria-describedby="name-addon">
                            </div>

                            <div class="mb-3">
                              <label>Descrição</label>
                              <input type="text" class="form-control" name="description" id="description" placeholder="Descrição" aria-label="Descrição" aria-describedby="description-addon">
                            </div>

                            <div class="mb-3">
                              <label>Pontos</label>
                              <input type="number" class="form-control" name="points_realization" id="points_realization" placeholder="Pontos" aria-label="Pontos" aria-describedby="points_realization-addon">
                            </div>

                            <div class="mb-3">
                              <label>Data de Inicio</label>
                              <input type="datetime-local" class="form-control" name="beginDateTime" id="beginDateTime" placeholder="Data de Inicio" aria-label="Data de Inicio" aria-describedby="beginDateTime-addon">
                            </div>

                            <div class="mb-3">
                              <label>Data Final</label> 
                              <input type="datetime-local" class="form-control" name="endDateTime" id="endDateTime" placeholder="Data Final" aria-label="Data Final" aria-describedby="endDateTime-addon">
                            </div>
                        </div>
                        <div>
                          <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Quantidade
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nome
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Adicionar
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($child as $i => $child)
                            <tr>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{$i+1}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{$child->user->name}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="children[]" id="children[]" value="{{$child->user_children_id}}">
                                      </div>
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-info w-10 mt-4 mb-0" value="submit">Criar</button>
                        </div>
                      </form>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
