@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <agregar-producto folio-aux="{{ $last_id }}"></agregar-producto>
        </div>
    </div>
</div>
@endsection
