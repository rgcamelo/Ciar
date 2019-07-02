<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id_articulo');
            $table->string('tipo_publicacion');
            $table->date('fechapublicacion_articulo');
            $table->string('nombrerevista');
            $table->string('tiporevista');
            $table->string('issn');
            $table->string('idioma_articulo');
            $table->string('noautores_articulo');
            $table->string('evidenciafiliacionUpc');
            $table->string('puntos_solicitados');
            $table->string('bonificacion_solicitada');
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
        Schema::dropIfExists('articulos');
    }
}
