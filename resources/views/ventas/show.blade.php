@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                                    {{'Detalle de venta con  Folio: '}}
                        </div>
                        <div class="col-md-2 text-left">
                            {{$ventaGeneral->folio}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   <div class = "table-responsive">
                       <table class = "table">
                           <thead class="thead-dark">
                                <tr>
                                    <th>Id de producto</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>total</th>
                                    <th>Devolucion</th>
                                </tr>
                            </thead>
                            @foreach ($ventasD as $ventaD)
                                <tr>
                                    <td>{{$ventaD->producto->id_producto}}</td>
                                    <td>{{$ventaD->producto->nombre}}</td>
                                    <td>{{$ventaD->precio}}</td>
                                    <td>{{$ventaD->cantidad}}</td>
                                    <td>{{$ventaD->total() }}</td>
                                    <td>
                                        @if ($ventaD->devuelto)
                                          <div class="text-info">Devuelto</div>
                                        @else
                                            <div class=" form-inline align-content-center">
                                                <form method="GET" action="{{ route('venta.devolver', $ventaD->id) }}">
                                                  @csrf
                                                    <input id="cantidad" class="form-control" type="number" min="1" max = {{$ventaD->cantidad}} name="cantidad" placeholder="Cantidad" required autofocus>
                                                        @error('cantidad')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    <button type="submit" class="btn btn-secondary">
                                                        {{ __('Devolver') }}
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="table-info">
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th>{{$ventaGeneral->total_productos}}</th>
                                <th>{{$ventaGeneral->total_pagado}}</th>
                                <th></th>
                            </tr>
                       </table>
                   </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('venta.pdf', $ventaGeneral->folio) }}">Descargar pdf</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
