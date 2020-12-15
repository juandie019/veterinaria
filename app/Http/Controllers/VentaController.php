<?php

namespace App\Http\Controllers;

use App\Venta;
use App\VentaDetallada;
use App\Producto;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\PDF;

class VentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = true;
      //  $this->authorize('viewAny',Venta::class);

        //dd(Auth()->user()->empleado->ventas);
       $ventas = Venta::orderBy('created_at', 'desc')->paginate(9);

       return view('ventas.index', compact('ventas', 'paginate'));
    }

    public function indexByCliente(Request $request){
        $paginate = false;

      //  $this->authorize('viewAny',Venta::class);


        //dd($request->all());
        $messages = [
            'exists' => 'No se encontro el cliente',
        ];

        $request-> validate([
            'id_cliente' => 'required',
            'id_cliente' => 'exists:clientes,numero_celular',
        ], $messages);


       $cliente = Cliente::find($request['id_cliente']);

       $ventas = $cliente->ventas;

       return view('ventas.index', compact('ventas', 'paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    $this->authorize('create',Venta::class);

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

       if($id_cliente == "")
         $id_cliente = "publico";

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

        $cantidad = 0;
        $subtotal = 0;

        foreach ($ventasD as $ventaD){
           $subtotal += $ventaD->total();
           $cantidad += $ventaD->cantidad;
        }

        $total = $subtotal + ($subtotal * .16);

        $descuento = ($ventaGeneral->descuento);

        if(isset($descuento)){
            $subtotalAux = $subtotal - $descuento->cantidad;
            $total = $subtotalAux + ($subtotalAux * .16);
        // dd($descuento);
       }


        return view('ventas.show', compact('ventasD', 'ventaGeneral', 'cantidad', 'total', 'subtotal', 'descuento'));
    }

    public function search(Request $request)
    {
        $messages = [
            'exists' => 'No se encontro el folio',
        ];

        $request-> validate([
            'id_venta' => 'required',
            'id_venta' => 'exists:ventas,folio',
        ], $messages);

        return redirect()->route('venta.show', $request['id_venta']);
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

    public function pdf($folio)
    {
        $pdf = app('dompdf.wrapper');
        $pdf ->loadHTML('<h1>Mi primer pdf</h1>');
        //no pude hacerlo funcionar con una plantilla blade
        return $pdf->download("VentaGeneral.pdf");
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
