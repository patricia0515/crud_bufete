<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes = Cliente::select ('id_cliente','tipo_documento','num_documento','nombres','apellidos')
                            ->where ('activo','=',1)
                           ->get();
                           return($clientes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente=new Cliente;
        $cliente->tipo_documento    = $request->tipo_documento;
        $cliente->num_documento     = $request->num_documento;
        $cliente->nombres           = $request->nombres;
        $cliente->apellidos         = $request->apellidos;
        $cliente->celular           = $request->celular;
        $cliente->direccion         = $request->direccion;
        $cliente->activo            = 1;
        $cliente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        // Accedo al objeto cliente, le paso el metodo delete y redireccionamos a la vista principal con un mensaje de validación
        $cliente->delete();
        return redirect()->route('principal')->with('info', 'El Cliente se elimino con éxito');
    }
}
