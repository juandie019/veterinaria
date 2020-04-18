@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de clientes') }}</div>
                <div class="card-body">
                   <div class = "table-responsive">
                       <table class = "table">
                            <tr>
                                <th>Nombre</th>
                                <th>Numero de telefono</th>
                                <th>Correo</th>
                                <th>RFC</th>

                            </tr>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->numero_celular}}</td>
                                    <td>{{$cliente->correo}}</td>
                                    <td>{{$cliente->rfc}}</td>
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
