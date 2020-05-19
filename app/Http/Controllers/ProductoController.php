<?php

namespace App\Http\Controllers;

use App\Producto;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Http\Resources\Producto as ProductoResource;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mensaje = "")
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();

        return view('productos.index', compact('productos', 'mensaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'string',
            'precio' => 'required|int',
            'ubicacion' => 'required'
        ]);

        $producto = new Producto();

        $producto -> nombre = $request['nombre'];
        $producto -> id_producto = $request['id_producto'];
        $producto -> precio = $request['precio'];
        $producto -> categoria = $request['categoria'];
        $producto -> marca = $request['marca'];
        $producto -> descripcion = $request['descripcion'];
        $producto -> ubicacion = $request['ubicacion'];
        $producto -> existencia_piso = $request['existencia_piso'];
        $producto -> existencia_almacen = $request['cantidad'];

        $producto -> save();

        return redirect() -> route("producto.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    public function search(Request $request){

        $producto = Producto::where('id_producto','LIKE', $request['id_producto'])->get();

        if(count($producto) > 0)
             return view('productos.show', compact('producto'));
        else return 'no se encontro';
    }

    public function buscar($productoId){
        $producto = Producto::find($productoId);


        if(isset($producto))
             return response(new ProductoResource($producto));
        else return null;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
    }

    public function actualizarAlmacen(Request $request){
        $producto = Producto::find($request['id_producto']);

        $mensaje = "No se encontro el producto con Id: " . $request['id_producto'];

        if(isset($producto)){
            $total = $producto -> existencia_almacen;

            if($request['boton'] == "Agregar")
                $total += $request['cantidad'];
            else $total -= $request['cantidad'];
                $producto->existencia_almacen = $total;

            $producto->save();
            $mensaje = "Se actualizo " . $producto -> nombre;
        }
        return view('productos.create', compact('mensaje'));
    }

    public function actualizarPiso(Request $request){
        $producto = Producto::find($request['id_producto']);

        $mensaje = "No se encontro el producto con Id: " . $request['id_producto'];

        if(isset($producto)){
          $producto -> existencia_almacen -= $request['cantidad'];
          $producto -> existencia_piso += $request['cantidad'];
          $producto->save();
          $mensaje = "Se agrego a piso " . $producto -> nombre;
        }
        return $this->index($mensaje);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
