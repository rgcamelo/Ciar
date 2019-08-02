<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechaReclamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fecha_reclamos', function (Blueprint $table) {
            $table->bigIncrements('idfechareclamo');
            $table->string('titulo');
            $table->unsignedBigInteger('idconvocatoria');
            $table->foreign('idconvocatoria')->references('idconvocatoria')->on('convocatorias');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('estado');
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
        Schema::dropIfExists('fecha_reclamos');
    }
}
