<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use Illuminate\Http\Request;

class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abogados = Abogado::select ('id_abogado','tipo_documento','num_tarjetaProfesional','num_documento','nombres','apellidos')
                            ->where ('activo','=',1)
                           ->get();
                           return($abogados);
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
        $abogado=new Abogado;
        $abogado->tipo_documento    = $request->tipo_documento;
        $abogado->num_documento     = $request->num_documento;
        $abogado->num_tarjetaProfesional     = $request->num_tarjetaProfesional;
        $abogado->nombres           = $request->nombres;
        $abogado->apellidos         = $request->apellidos;
        $abogado->celular           = $request->celular;
        $abogado->direccion         = $request->direccion;
        $abogado->activo            = 1;
        $abogado->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function show(Abogado $abogado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function edit(Abogado $abogado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abogado $abogado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abogado $abogado)
    {
        //
    }
}
