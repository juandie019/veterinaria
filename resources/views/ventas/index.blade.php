@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <form method="post" action = "/venta/search">
                           @csrf
                           <div class="row">
                                <div class ="col-md-6 ">
                                    {{ __('Lista de Ventas') }}
                                </div>
                                <div class="col-md-4">
                                    <input id="id_venta" type="text" class="form-control @error('id_venta') is-invalid @enderror" name="id_venta" value="{{ old('id_venta') }}" required autocomplete="id_venta" autofocus placeholder="Folio de venta">

                                    @error('id_venta')
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
                                <th>Cajero</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                {{--<th>Total</th>--}}
                                <th></th>
                            </tr>
                            @foreach ($ventas as $venta)
                                <tr>
                                    <td>{{$venta->folio}}</td>
                                    <td>{{$venta->empleado['nombre']}}</td>
                                    <td>{{$venta->id_cliente}}</td>
                                    <td>{{$venta->created_at}}</td>
                                   {{-- <td>{{$venta->total_pagado}}</td>--}}
                                    <td>
                                        <a class="btn btn-secondary" title="Ver detalles o hacer devolucion de la venta" href="{{ route('venta.show', $venta->folio) }}">Ver venta</a>
                                    </td>
                                </tr>
                            @endforeach
                       </table>
                   </div>
                   @if ($paginate)
                   {{ $ventas->links() }}
                   @endif
                </div>
                <div class="card-footer">
                    <form method="POST" action = "/venta/cliente_index">
                      @csrf
                        <div class="row">
                            <div class="col-md-3 ">
                                Buscar venta por cliente
                            </div>
                            <div class="col-md-3  offset-md-4">
                                <input id="id_cliente" type="text" class="form-control @error('id_cliente') is-invalid @enderror" name="id_cliente" value="{{ old('id_cliente') }}" placeholder="ID de Cliente" required autocomplete="id_cliente" autofocus>
                                @error('id_cliente')
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
