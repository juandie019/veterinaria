@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <p class="col-md-4">Id empleado</p>
                        <p class="col-md-6 text-md-left">{{$empleado[0]->id_empleado}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">Nombre</p>
                        <p class="col-md-6 text-md-left">{{$empleado[0]->nombre}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">Puesto</p>
                        <p class="col-md-6 text-md-left">{{$empleado[0]->puesto->nombre}}</p>
                    </div>  <div class="row">
                        <p class="col-md-4">Fecha de Contrato</p>
                        <p class="col-md-6 text-md-left">{{$empleado[0]->fecha_contrato}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Ultimas ventas') }}
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                            <p class="col-md-4">Numero de  celular</p>
                            <p class="col-md-6 text-md-left">{{$empleado[0]->puesto}}</p>
                    </div>
                </div>
            </div>
            <br>
            <form method="POST" action="/desconocida" >
                <div class="row form-group">
                    <div class="col-md-7">
                        <label for="contenido" class="col-md-4 col-form-label ">Enviar Mensaje</label>
                        <textarea name="contenido" id="contenido" cols="10" rows="5" class="form-control col-md-7"></textarea>
                   </div>
                </div>
                <div class="row form-group">
                  <div  class="col-md-8 offset-3">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
