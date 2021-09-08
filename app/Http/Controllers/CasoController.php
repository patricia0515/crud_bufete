<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Cliente;
use App\Models\Abogado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casos = Caso::join('clientes as cli','casos.cliente','=','cli.id_cliente')
                        ->join('abogados as abg','casos.abogado','=','abg.id_abogado')
                        ->select(
                            DB::raw("CONCAT(cli.nombres,' ',cli.apellidos) as CLIENTE"),
                            DB::raw("CONCAT(abg.nombres,' ',abg.apellidos) as ABOGADO"),
                            'casos.id_caso as ID',
                            'casos.num_expediente as N° EXPEDIENTE',
                            'casos.estado as ESTADO'  
                        )
                        ->where('casos.activo','=',1)
                        ->orderBy("id_caso", "desc")
                        ->get();
                        return($casos);
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
