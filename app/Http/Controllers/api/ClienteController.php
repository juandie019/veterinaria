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
                return response(['cupon' => true, 'nombre' => $cliente->nombre, 'cantidad' => $cliente->cupon->obtenerCupones()]);
            }

            return response(['nombre' => $cliente->nombre]);
        }

        return response(['noFound' => true]);
        //return return Response::make($contents, 200, $headers);
    }


}
