<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cupon;
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
        $this->authorize('viewAny', Cliente::class);

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
        $this->authorize('create', Cliente::class);

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
        $messages = [
            'unique' => 'Ya hay un cliente usando este Telefono',
        ];

        $request->validate([
           'nombre' => 'nullable',
           'numero_celular' => 'required|digits:10|unique:clientes,numero_celular',
           'correo' => 'nullable|email:rfc',
           'rfc' => 'nullable|alpha_num'
        ], $messages);

        $cliente = new Cliente();

        $cliente -> nombre = $request['nombre'];
        $cliente -> numero_celular = $request['numero_celular'];
        $cliente -> rfc = $request['rfc'];
        $cliente -> correo = $request['correo'];

        $cliente -> save();

        $cupon = new Cupon();
        $cupon->cliente_id = $request['numero_celular'];
        $cupon ->save();

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
        $this->authorize('viewAny',Cliente::class);

        return view('clientes.show', compact('cliente'));
    }

    public function search(Request $request){

        $messages = [
           'exists' => 'No es encontro al cliente',
        ];

        $request->validate([
            'numero_celular' => 'required',
            'numero_celular' => 'exists:clientes,numero_celular',
        ], $messages);

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
