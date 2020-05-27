<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;
use Dotenv\Repository\RepositoryInterface;
use SebastianBergmann\Environment\Console;
use App\Http\Resources\Producto as ProductoResource;

class ProductoController extends Controller
{
    public function buscar(Request $request, $productoId)
    {
        $producto = Producto::find($productoId);

            if(isset($producto)){

                if(intval($producto->existencia_piso) < intval($request['cantidad']))
                   return response(['noSuficiente' => true,  'cantidad' => $producto->existencia_piso]);

                return response(new ProductoResource($producto));
            }else return response(['noFound' => true]);
    }

   // public function reducir_productos($)
}
