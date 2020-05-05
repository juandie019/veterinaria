@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <form method="POST" action = "/empleado/search">
                           @csrf
                           <div class="row">
                                <div class ="col-md-6 ">
                                    {{ __('Lista de Empleados') }}
                                </div>
                                <div class="col-md-4">
                                    <input id="id_empleado" type="text" class="form-control @error('id_empleado') is-invalid @enderror" name="id_empleado" value="{{ old('id_empleado') }}" required autocomplete="id_empleado" autofocus placeholder="Id de empleado">

                                    @error('id_empleado')
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
                                <th>ID empleado</th>
                                <th>Puesto</th>
                                <th>Sueldo por dia</th>
                                <th>Fecha de contrato</th>
                            </tr>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{$empleado->nombre}}</td>
                                    <td>{{$empleado->id_empleado}}</td>
                                    <td>{{$empleado->puesto->nombre}}</td>
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
