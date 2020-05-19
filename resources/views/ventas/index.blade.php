@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <form method="POST" action = "/producto/search">
                           @csrf
                           <div class="row">
                                <div class ="col-md-6 ">
                                    {{ __('Lista de Productos') }}
                                </div>
                                <div class="col-md-4">
                                    <input id="id_producto" type="text" class="form-control @error('id_producto') is-invalid @enderror" name="id_producto" value="{{ old('id_producto') }}" required autocomplete="id_producto" autofocus placeholder="Id de producto">

                                    @error('id_producto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2 ">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Buscar') }}
                                    </button>
                                </div>
                           </div>
                       </form>
                   </div>
                </div>
                <div class="card-body">
                   <div class = "table-responsive">
                       <table class = "table">
                            <tr>
                                <th>Nombre</th>
                                <th>ID producto</th>
                                <th>Precio</th>
                                <th>Marca</th>
                                <th>Existencia en piso</th>
                                <th>Existencia en almacen</th>
                            </tr>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->id_producto}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>{{$producto->marca}}</td>
                                    <td>{{$producto->existencia_piso}}</td>
                                    <td>{{$producto->existencia_almacen}}</td>
                                </tr>
                            @endforeach
                       </table>
                   </div>
                </div>
                <div class="card-footer">
                    <form method="POST" action = "/producto/actualizar_piso">
                      @csrf
                        <div class="row">
                            <div class="col-md-3 ">
                                Buscar por cliente
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
        </div>
    </div>
</div>
@endsection
