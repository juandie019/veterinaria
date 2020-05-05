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
                        <p class="col-md-4">Id Producto:</p>
                        <p class="col-md-6 text-md-left">{{$producto[0]->id_producto}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">Nombre:</p>
                        <p class="col-md-6 text-md-left">{{$producto[0]->nombre}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">Precio:</p>
                        <p class="col-md-6 text-md-left">{{$producto[0]->precio }}</p>
                    </div>  <div class="row">
                        <p class="col-md-4">Marca:</p>
                        <p class="col-md-6 text-md-left">{{$producto[0]->marca}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">Categoria:</p>
                        <p class="col-md-6 text-md-left">{{$producto[0]->categoria}}</p>
                    </div>
                    <div class="row">
                        <p class="col-md-4">Ubicacion:</p>
                        <p class="col-md-6 text-md-left">{{$producto[0]->ubicacion}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Descripcion') }}
                        </div>
                        <div class="card-body">
                         {{$producto[0]->descripcion}}
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                            <p class="col-md-4">Existencia Almacen: </p>
                            <p class="col-md-6 text-md-left">{{$producto[0]->existencia_almacen}}</p>
                    </div>
                    <div class="row">
                            <p class="col-md-4">Existencia Piso:</p>
                            <p class="col-md-6 text-md-left">{{$producto[0]->existencia_piso}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
