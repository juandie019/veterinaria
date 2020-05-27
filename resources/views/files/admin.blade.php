@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form  action="/file" enctype="multipart/form-data" method="post">
                        @csrf
                          <label for="image">Elige uno o mas archivos</label>

                          <input id="image" type="file" multiple class="form-control-image @error('image[]') is-invalid @enderror" name="image[]" value="{{ old('image[]') }}" required autofocus>

                          @error('image[]')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                          <input type="submit" class="btn btn-primary", value="Subir">
                      </form>
                </div>

                <div class="card-body">
                    <div class="row pt-5">
                        @foreach($imagenes as $imagen)
                            <div class="col-4 pb-4">
                                    <img src="/storage/{{ $imagen->path }}" class="rounded-circle w-15" width="30" height="30">
                                    <a class="btn btn-dark" href="{{ route('user.imagen', $imagen->id) }}">Usar</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                 Sube pequeñas imagenes para que puedan se usadas como avatar.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
