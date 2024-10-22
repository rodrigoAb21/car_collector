<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaVehiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('codigo')->nullable();
            $table->foreignId('marca_id');
            $table->foreignId('serie_id')->nullable();
            $table->foreignId('usuario_id');
            $table->boolean('eliminado')->default(0);

            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
