<?php

namespace App\Http\Controllers;

use App\Venta;
use App\VentaDetallada;
use App\Producto;
use Illuminate\Http\Request;

class DevolucionVenta extends Controller
{
  public function devolverProducto(Request $request, $id_venta)
  {
     $ventaD = VentaDetallada::find($id_venta);

     $cantidad = $ventaD->cantidad;

     //movemos nuestros productos a almacen
     $ventaD->producto->existencia_almacen += $request['cantidad'];
     $ventaD->producto->save();

     //actualizamos nuestra venta detallada
     $ventaD->cantidad -= $request['cantidad'];
     if($ventaD->cantidad == "0")
       $ventaD->devuelto = true;
     $ventaD->save();

    //  //actualizamos nuestra venta general
    //  $ventaD->venta->total_productos -= $request['cantidad'];
    //  $ventaD->venta->total_pagado -= $ventaD->precio * $request['cantidad'];
    //  $ventaD->venta->save();


     return back();

  }
}
