<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Puesto;
use App\UsuarioDisponible;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
      //  $this->authorize('viewAny',Empleado::class);

        $empleados = Empleado::with('puesto')->orderBy('created_at', 'desc')->get();//eagerloading
        return view("empleados.index", compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  $this->authorize('create',Empleado::class);

        $puestos = Puesto::all();

        return View('empleados.create', compact('puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_empl = "")
    {
        $messages = [
            'unique' => 'Ya se esta usando este id',
        ];

        if($id_empl == ""){
           $request->validate([
            'id_empleado' => 'unique:empleados,id_empleado',
           ], $messages);
        }
            $request->validate([
                'nombre' => 'required',
                'puesto_id' => 'required|int',
                'fecha' => 'date|required',
                'sueldo' => 'int',
            ]);


        // if($id_empleado == "") //si no recibimos el id lo generamos
        //     $id_empleado = $this->generarId($request);

        $empleado = new Empleado();
        $empleado -> nombre = $request['nombre'];
        if($id_empl == "")
          $empleado -> id_empleado = $request['id_empleado'];
        else
          $empleado-> id_empleado =$id_empl;
        $empleado -> puesto_id = $request['puesto_id'];
        $empleado -> fecha_contrato = $request['fecha'];
        $empleado -> sueldo_diario = $request['sueldo'];
        $empleado -> numero_celular = $request['numero_celular'];
        $empleado -> save();

        $this->guardarId($request['id_empleado']);
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

        $messages = [
            'exists' => 'No es encontro al empleado',
        ];

        $request-> validate([
            'id_empleado' => 'required',
            'id_empleado' => 'exists:empleados,id_empleado',
        ], $messages);

        $empleado = Empleado::where('id_empleado','LIKE',$request['id_empleado'])->get();

        $user = User::where('id','LIKE','1')->get();

        $puesto = User::find(1)->empleado->puesto->nombre;

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
