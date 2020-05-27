<?php

namespace App\Http\Controllers;

use App\Venta;
use App\VentaDetallada;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ventas = Venta::orderBy('created_at', 'desc')->paginate(9);
       return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_id = $this->generarFolio();

        return view("ventas.create", compact('last_id'));

        //retornar un folio de venta;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

       $venta = new Venta();
       $venta->folio = $folio;
       $venta->id_cliente = $id_cliente;
       $venta->id_empleado = auth()->user()->empleado->id;
       $venta->total_productos = $total_productos;
       $venta->total_pagado = $total;
       $venta->Save();

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


    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show($venta_id)
    {
        $ventaGeneral = Venta::find($venta_id);
        $ventasD = $ventaGeneral->ventas_detalladas;
        return view('ventas.show', compact('ventasD', 'ventaGeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }

    public function generarFolio(){
        $last_id = DB::table('ventas')->latest('id')->first();

        //$last_id ?? "0";
        if(!isset($last_id))
            return "1";

        return $last_id->id + 1;
    }
}
