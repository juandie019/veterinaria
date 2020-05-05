@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <form method="POST" action = "/cliente/search">
                           @csrf
                           <div class="row">
                                <div class ="col-md-6 ">
                                    {{ __('Lista de clientes') }}
                                </div>
                                <div class="col-md-4">
                                    <input id="numero_celular" type="text" class="form-control @error('numero_celular') is-invalid @enderror" name="numero_celular" value="{{ old('numero_celular') }}" required autocomplete="numero_celular" autofocus placeholder="Numero de celular">

                                    @error('numero_celular')
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
