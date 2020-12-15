<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Venta;
use App\VentaDetallada;
use App\Producto;
use App\Cliente;
use App\Descuento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VentaController extends Controller
{

    public function store(Request $request)
    {
       $data = $request['data'];
       $productos = $data['lista'];
       $total_productos = $data['cantidad'];
       $total = $data['total'];
       $id_cliente = $data['id_cliente'];
       $folio = $this->generarFolio();

       foreach($productos as $producto){
           $this->storeVentaDetallada($producto, $folio);
       }

       // if($id_cliente =! 'publico'){
        $cliente = Cliente::find($id_cliente);

        if(isset($cliente)){
            if($cliente->cupon->disponible && $data['cantidad_cupones'] > 0){
                $cliente->cupon->usar($data['cantidad_cupones']);
                $this->descuento($folio, $data['descuento']);
             }

             $cliente->cupon->acumularMonto($total);
             $cliente->cupon->save();
        }else
          $id_cliente = "9874561230";

        $venta = new Venta();
        $venta->folio = $folio;
        $venta->id_cliente = $id_cliente;
        $venta->id_empleado = auth()->user()->id_empleado;
        $venta->Save();



     //  }

       return response($folio = $this->generarFolio());
    }

    public function storeVentaDetallada($productoAux, $folio_venta){
      $producto = Producto::find($productoAux['id_producto']);

      $producto->reducir_piso($productoAux['cantidad']);

      $ventaD = new VentaDetallada();
      $ventaD->folio_venta = $folio_venta;
      $ventaD->id_producto = $producto['id_producto'];
      $ventaD->cantidad = $productoAux['cantidad'];
      $ventaD->precio = $producto['precio'];
      $ventaD->Save();
    }

    public function generarFolio(){
        $last_id = DB::table('ventas')->latest('id')->first();

        //$last_id ?? "0";
        if(!isset($last_id))
            return "1";

        return $last_id->id + 1;
    }

    public function descuento($folio, $cantidad)
    {
        $descuento = new Descuento();

        $descuento->folio_venta = $folio;
        $descuento->cantidad = $cantidad;
        $descuento->save();
    }
}
