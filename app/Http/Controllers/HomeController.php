<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_empleado = auth()->user()->id_empleado;

        if(isset(auth()->user()->empleado)){
            if(auth()->user()->empleado->esCajero())
              return redirect()->route('venta.create');
            else if(auth()->user()->empleado->esAlmacenista())
              return redirect()->route('producto.index');
            else if(auth()->user()->empleado->esGerente())
              return redirect()->route('empleado.index');
        }else
            return view('empleados.primero', compact('id_empleado'));
    }
}
