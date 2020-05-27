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
                                    {{ __('Lista de Ventas') }}
                                </div>
                                <div class="col-md-4">
                                    <input id="id_producto" type="text" class="form-control @error('id_producto') is-invalid @enderror" name="id_producto" value="{{ old('id_producto') }}" required autocomplete="id_producto" autofocus placeholder="Folio de venta">

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
                                <th>Folio</th>
                                <th>Cantidad</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            @foreach ($ventas as $venta)
                                <tr>
                                    <td>{{$venta->folio}}</td>
                                    <td>{{$venta->total_productos}}</td>
                                    <td>{{$venta->id_cliente}}</td>
                                    <td>{{$venta->created_at}}</td>
                                    <td>{{$venta->total_pagado}}</td>
                                    <td>
                                        <a class="button button-primary" title="Ver detalles o hacer devolucion de la venta" href="{{ route('venta.show', $venta->folio) }}">Ver venta</a>
                                    </td>
                                </tr>
                            @endforeach
                       </table>
                   </div>
                   {{ $ventas->links() }}
                </div>
                <div class="card-footer">
                    <form method="POST" action = "/producto/actualizar_piso">
                      @csrf
                        <div class="row">
                            <div class="col-md-3 ">
                                Buscar venta por cliente
                            </div>
                            <div class="col-md-3  offset-md-4">
                                <input id="id_producto" type="text" class="form-control @error('id_producto') is-invalid @enderror" name="id_producto" value="{{ old('id_producto') }}" placeholder="ID de Cliente" required autocomplete="id_producto" autofocus>
                                @error('id_producto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-md-2">
                                <input type="submit" name = "boton" value = "Buscar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
