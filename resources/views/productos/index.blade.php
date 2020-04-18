@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de productos') }}</div>
                <div class="card-body">
                   <div class = "table-responsive">
                       <table class = "table">
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Marca</th>
                                <th>Existencia en piso</th>
                                <th>Existencia en almacen</th>
                            </tr>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>{{$producto->marca}}</td>
                                    <td>{{$producto->existencia_piso}}</td>
                                    <td>{{$producto->existencia_almacen}}</td>
                                </tr>
                            @endforeach
                       </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
