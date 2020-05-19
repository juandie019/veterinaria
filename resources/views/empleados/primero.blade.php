@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar gerente') }}</div>

                <div class="card-body">
                        <div class="text-primary">
                            <p>
                               Este registro pertenece al gerente de la veterinaria. Es muy importante
                               terminarlo para comenzar a admistrar el sistema.
                            </p>
                        </div>
                    <form method="POST" action = "/empleado/{{$id_empleado}}/primero">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sueldo" class="col-md-4 col-form-label text-md-right">{{ __('Sueldo por dia') }}</label>

                            <div class="col-md-6">
                                <input id="sueldo" type="text" class="form-control @error('sueldo') es-invalido @enderror" name="sueldo" value="{{ old('sueldo') }}" autocomplete="Sueldo" autofocus>

                                @error('sueldo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha contratacion') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="text" class="form-control @error('fecha') es-invalido @enderror" name="fecha" value="{{ old('fecha') }}" autocomplete="Fecha" autofocus>

                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
