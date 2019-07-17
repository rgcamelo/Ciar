<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->bigIncrements('iddocente');
            $table->string('NombreCompleto');
            $table->unsignedBigInteger('tipoidentificacion_id');
            $table->foreign('tipoidentificacion_id')->references('idtipoidentificacion')->on('tipo_identificacions');
            $table->string('Identificacion');
            $table->unsignedBigInteger('dedicacion_id');
            $table->foreign('dedicacion_id')->references('iddedicacion')->on('dedicacions');
            $table->unsignedBigInteger('Departamento');
            $table->foreign('Departamento')->references('iddepartamento')->on('departamentos');
            $table->unsignedBigInteger('grupoInvestigacion_id');
            $table->foreign('grupoInvestigacion_id')->references('idgrupo')->on('grupo_investigacions');
            $table->string('Correo');
            $table->string('Telefono');
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
        Schema::dropIfExists('docentes');
    }
}
