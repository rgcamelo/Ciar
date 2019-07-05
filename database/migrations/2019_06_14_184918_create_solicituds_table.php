<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->bigIncrements('idsolicitud');
            $table->unsignedBigInteger('productividad_id');
            $table->foreign('productividad_id')->references('idproductividad')->on('productividads');
            $table->string('estado');
            $table->string('observaciones')->nullable();
            $table->string('puntos_aprox')->nullable();
            $table->string('puntos_asignados')->nullable();
            $table->string('bonificacion_calculada')->nullable();
            $table->string('bonificacion_asignada')->nullable();
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
        Schema::dropIfExists('solicituds');
    }
}
