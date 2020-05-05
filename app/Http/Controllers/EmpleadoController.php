<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Puesto;
use App\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $empleados = Empleado::orderBy('created_at', 'desc')->get();
        return view("empleados.index", compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestos = Puesto::all();

        return View('empleados.create', compact('puestos'));
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
          'nombre' => 'required',
          'puesto_id' => 'required',
          'fecha' => 'date',
          'sueldo' => 'int'
        ]);

        $empleado = new Empleado();

        $empleado -> nombre = $request['nombre'];
        $empleado-> id_empleado = $request['id_empleado'];
        $empleado -> puesto_id = $request['puesto_id'];
        $empleado -> fecha_contrato = $request['fecha'];
        $empleado -> sueldo_diario = $request['sueldo'];
        $empleado -> save();
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $empleado = Empleado::where('id_empleado','LIKE',$request['id_empleado'])->get();

        $user = User::where('id','LIKE','1')->get();

        $puesto = User::find(1)->empleado->puesto->nombre;


        dd($puesto);

        if(count($empleado) > 0)
             return view('empleados.show', compact('empleado'));
        else return 'no se encontro';

    }

    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
