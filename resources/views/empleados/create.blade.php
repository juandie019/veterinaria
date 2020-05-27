@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar empleado') }}</div>

                <div class="card-body">
                    <form method="POST" action = "/empleado">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Id de empleado') }}</label>

                            <div class="col-md-6">
                                <input id="id_empleado" type="text" class="form-control @error('id_empleado') is-invalid @enderror" name="id_empleado" value="{{ old('id_empleado') }}" required autocomplete="id_empleado" autofocus>

                                @error('id_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="puesto_id" class="col-md-4 col-form-label text-md-right">{{ __('Puesto') }}</label>

                            <div class="col-md-6">

                                <select name="puesto_id" id="pueso" class="form-control" required>
                                    @foreach ($puestos as $puesto)
                                      <option value={{$puesto->id}}>{{$puesto->nombre}}</option>
                                    @endforeach
                                </select>

                                @error('puesto_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sueldo" class="col-md-4 col-form-label text-md-right">{{ __('Sueldo') }}</label>

                            <div class="col-md-6">
                                <input id="sueldo" type="text" class="form-control @error('sueldo') is-invalid @enderror" name="sueldo" value="{{ old('sueldo') }}" required autocomplete="sueldo" autofocus>

                                @error('sueldo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}"  autocomplete="fecha" autofocus>

                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero_celular" class="col-md-4 col-form-label text-md-right">{{ __('Numero de celular') }}</label>

                            <div class="col-md-6">
                                <input id="numero_celular" type="text" class="form-control @error('numero_celular') is-invalid @enderror" name="numero_celular" value="{{ old('numero_celular') }}" autocomplete="numero_celular" autofocus>

                                @error('numero_celular')
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
