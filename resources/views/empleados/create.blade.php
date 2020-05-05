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
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_empleado" class="col-md-4 col-form-label text-md-right">{{ __('ID de empleado') }}</label>

                            <div class="col-md-6">
                                <input id="id_empleado" type="text" class="form-control @error('id_empleado') is-invalid @enderror" name="id_empleado" value="{{ old('id_empleado') }}" required autocomplete="name" autofocus>

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
