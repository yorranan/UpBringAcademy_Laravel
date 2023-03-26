@extends('layouts.user_type.auth')
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                      <form role="form" method="POST" action="gratification-store">
                        <div class="text-center"><h5>Criar Bonificação</h5></div>
                        <div class="d-flex flex-row justify-content-between">
                          <div></div>
                          <div>
                            @csrf
                            <div></div>
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
                              <input type="number" class="form-control" name="realizationPoints" id="realizationPoints" placeholder="Pontos" aria-label="Pontos" aria-describedby="realizationPoints-addon">
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" value="submit">Criar</button>
                            </div>
                          </div>
                          <div></div>
                        </div>
                        <div>
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
