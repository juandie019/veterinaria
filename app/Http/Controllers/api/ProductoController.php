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
        $producto = Producto::find($productoId);//1

            if(isset($producto)){ //2

                if(intval($producto->existencia_piso) < intval($request['cantidad']) || intval($request['cantidad']) <= 0)// 3 4
                   return response(['noSuficiente' => true,  'cantidad' => $producto->existencia_piso]);// 5

                return response(new ProductoResource($producto)); //6
            }else
            return response(['noFound' => true]); //7
    }

   // public function reducir_productos($)
}
