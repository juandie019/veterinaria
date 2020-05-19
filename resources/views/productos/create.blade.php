@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar producto') }}</div>
                <div class="card-body">
                    <form method="POST" action = "/producto">
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
                            <label for="id_producto" class="col-md-4 col-form-label text-md-right">{{ __('ID de producto') }}</label>

                            <div class="col-md-6">
                                <input id="id_producto" type="text" class="form-control @error('id_producto') is-invalid @enderror" name="id_producto" value="{{ old('id_producto') }}" required autocomplete="id_producto" autofocus>

                                @error('id_producto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('precio') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" required autocomplete="precio" autofocus>

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text" class="form-control @error('categoria') es-invalido @enderror" name="categoria" value="{{ old('categoria') }}" autocomplete="categoria" autofocus>

                                @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control @error('marca') es-invalido @enderror" name="marca" value="{{ old('marca') }}" autocomplete="marca" autofocus>

                                @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('descripcion') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="textarea" class="form-control @error('descripcion') es-invalido @enderror" name="descripcion" value="{{ old('descripcion') }}" autocomplete="descripcion" autofocus>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ubicacion" class="col-md-4 col-form-label text-md-right">{{ __('Ubicación') }}</label>

                            <div class="col-md-6">
                                <input id="ubicacion" type="text" class="form-control @error('ubicacion') es-invalido @enderror" name="ubicacion" value="{{ old('ubicacion') }}" autocomplete="ubicacion" autofocus>

                                @error('ubicacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control @error('cantidad') es-invalido @enderror" name="cantidad" value="{{ old('cantidad') }}" autocomplete="cantidad" autofocus>

                                @error('cantidad')
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
                <div class="card-footer">
                    <form method="POST" action = "/producto/actualizar_almacen">
                      @csrf
                        <div class="row">
                            <div class="col-md-3 ">
                                Agregar a almacen
                            </div>
                            <div class="col-md-3  offset-md-2">
                                <input id="id_producto" type="text" class="form-control @error('id_producto') is-invalid @enderror" name="id_producto" value="{{ old('id_producto') }}" placeholder="ID de producto" required autocomplete="id_producto" autofocus>
                                @error('id_producto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-md-2">
                                <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required placeholder="Cantidad" autocomplete="cantidad" autofocus>
                                @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-md-2">
                                <input type="submit" name = "boton" value = "Agregar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(isset($mensaje))
            <p class="alert alert-success" role="alert">{{$mensaje}}</p>
            @endif
        </div>
    </div>
</div>
@endsection
