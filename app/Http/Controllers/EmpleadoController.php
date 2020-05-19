<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Puesto;
use App\UsuarioDisponible;
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
    public function store(Request $request, $id_empleado = "")
    {
        if($id_empleado == "") //si no recibimos el id lo generamos
            $id_empleado = $this->generarId($request);

        $request->validate([
          'nombre' => 'required',
          'puesto_id' => 'required',
          'fecha' => 'date',
          'sueldo' => 'int'
        ]);

        $empleado = new Empleado();

        $empleado -> nombre = $request['nombre'];
        $empleado-> id_empleado =$id_empleado;
        $empleado -> puesto_id = $request['puesto_id'];
        $empleado -> fecha_contrato = $request['fecha'];
        $empleado -> sueldo_diario = $request['sueldo'];
        $empleado -> save();

        $this->guardarId($id_empleado);
        return redirect()->route('empleado.index');
    }

    public function generarId($datos)
    { //terminar esta funcion
       $empleado_id =+ $datos['puesto_id'];
       $empleado_id += $datos['sueldo'];

       return $empleado_id;
    }

    public function guardarId($id_empleado){
        $usuario = new UsuarioDisponible();
        $usuario->id_empleado = $id_empleado;
        $usuario->save();
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

    public function primerEmpleado(Request $request, $id_empleado){
         $request['puesto_id'] = "3";

         return $this-> store($request, $id_empleado);
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
