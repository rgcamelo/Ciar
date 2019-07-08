<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamos', function (Blueprint $table) {
            $table->bigIncrements('idreclamo');
            $table->unsignedBigInteger('id_solicitud');
            $table->foreign('id_solicitud')->references('idsolicitud')->on('solicituds');
            $table->string('contenido');
            $table->string('soporte')->nullable();
            $table->string('estado');
            $table->string('soporte_respuesta')->nullable();
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
        Schema::dropIfExists('reclamos');
    }
}
