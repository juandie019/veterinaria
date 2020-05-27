<?php

namespace App\Http\Controllers\api;

use App\Cliente;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function buscar($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);

        if(isset($cliente)){

        if($cliente->cupon->disponible){
            return response(['cupon' => true]);
        }

        return response($cliente->numero_celular);
        }

        return response(['noFound' => true]);
        //return return Response::make($contents, 200, $headers);
    }


}
