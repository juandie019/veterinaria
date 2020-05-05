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
                        <p class="col-md-4">Nombre</p>
                        <p class="col-md-6 text-md-left">{{$cliente[0]->nombre}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">Numero de celular</p>
                        <p class="col-md-6 text-md-left">{{$cliente[0]->numero_celular}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">RFC</p>
                        <p class="col-md-6 text-md-left">{{$cliente[0]->rfc}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Cupones disponibles') }}
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
                            <p class="col-md-4">Correo electronico</p>
                            <p class="col-md-6 text-md-left">{{$cliente[0]->correo}}</p>
                    </div>
                </div>
            </div>
            <br>
            <form method="POST" action="/desconocida" >
                <div class="row form-group">
                    <div class="col-md-7">
                        <label for="contenido" class="col-md-4 col-form-label ">Enviar correo</label>
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
