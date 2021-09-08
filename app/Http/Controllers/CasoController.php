<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Cliente;
use App\Models\Abogado;
use Illuminate\Http\Request;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casos = Caso::all();
        
        return view('principal', compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caso=new Caso;
        $caso->num_expediente    = $request->num_expediente;
        $caso->fecha_inicio      = $request->fecha_inicio;
        $caso->estado            = $request->estado;
        $caso->cliente           = $request->cliente;
        $caso->abogado           = $request->abogado;
        $caso->activo            = 1;
        $caso->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function show(Caso $caso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso $caso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caso $caso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caso $caso)
    {
        //
    }
}
