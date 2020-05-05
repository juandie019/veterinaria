<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $clientes = Cliente::orderBy('created_at', 'desc')->get();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
           'nombre' => 'nullable|alpha|max:30',
           'numero_celular' => 'required|digits:10',
           'correo' => 'nullable|email:rfc',
           'rfc' => 'nullable|alpha_num'
        ]);

        $cliente = new Cliente();

        $cliente -> nombre = $request['nombre'];
        $cliente -> numero_celular = $request['numero_celular'];
        $cliente -> rfc = $request['rfc'];
        $cliente -> correo = $request['correo'];

        $cliente -> save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */


    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function search(Request $request){
         $cliente = Cliente::where('numero_celular','LIKE',$request['numero_celular'])->get();

        if(count($cliente) > 0)
            return view('clientes.show', compact('cliente'));
        else return 'no se encontro';

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
