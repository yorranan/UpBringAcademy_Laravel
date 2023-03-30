@extends('layouts.user_type.auth')
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                      <form role="form" method="POST" action="user-store">
                        <div><h5>Criar Usuario</h5></div>
                              @csrf
                              <div class="mb-3">
                                  <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                                  @error('name')
                                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <input type="date" class="form-control" placeholder="Age" name="age" id="age" aria-label="Age" aria-describedby="age" value="{{ old('age') }}">
                                  @error('age')
                                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                                  @error('email')
                                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                                  @error('password')
                                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                  @enderror
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
