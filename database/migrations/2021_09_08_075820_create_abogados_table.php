<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbogadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abogados', function (Blueprint $table) {
            $table->bigIncrements('id_abogado');
            $table->string('tipo_documento');
            $table->string('num_documento');
            $table->string('num_tarjetaProfesional');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('direccion');
            $table->boolean('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abogados');
    }
}