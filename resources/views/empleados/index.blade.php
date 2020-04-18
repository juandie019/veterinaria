@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de empleados') }}</div>
                <div class="card-body">
                   <div class = "table-responsive">
                       <table class = "table">
                            <tr>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Sueldo por dia</th>
                                <th>Fecha de contrato</th>
                            </tr>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{$empleado->nombre}}</td>
                                    <td>{{$empleado->puesto}}</td>
                                    <td>{{$empleado->sueldo_diario}}</td>
                                    <td>{{$empleado->fecha_contrato}}</td>
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
