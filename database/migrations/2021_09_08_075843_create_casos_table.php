<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->bigIncrements('id_caso');
            $table->string('num_expediente');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('estado');
            $table->boolean('activo');//$table->enum('difficulty', ['easy', 'hard']);

            $table->unsignedBigInteger('cliente')->nullable();
            $table->unsignedBigInteger('abogado')->nullable();

            $table->foreign('cliente')
            ->references('id_cliente')
            ->on('clientes')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('abogado')
            ->references('id_abogado')
            ->on('abogados')
            ->onDelete('set null')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('casos');
    }
}
