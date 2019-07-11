<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->bigIncrements('idconvocatoria');
            $table->string('titulo');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('estado');
            $table->string('solicitudes')->nullable();
            $table->string('aprobadas')->nullable();
            $table->string('rechazadas')->nullable();
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
        Schema::dropIfExists('convocatorias');
    }
}
