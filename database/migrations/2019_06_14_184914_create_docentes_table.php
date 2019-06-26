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
            $table->bigIncrements('id');
            $table->string('NombreCompleto');
            $table->unsignedBigInteger('tipoidentificacion_id');
            $table->foreign('tipoidentificacion_id')->references('id')->on('tipo_identificacions');
            $table->string('Identificacion');
            $table->unsignedBigInteger('Departamento');
            $table->foreign('Departamento')->references('id')->on('departamentos');
            $table->unsignedBigInteger('grupoInvestigacion_id');
            $table->foreign('grupoInvestigacion_id')->references('id')->on('grupo_investigacions');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
