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
            $table->string('tipo_publicacion')->nullable();
            $table->date('fechapublicacion_articulo')->nullable();
            $table->string('nombrerevista')->nullable();
            $table->string('tiporevista')->nullable();
            $table->string('issn')->nullable();
            $table->string('idioma_articulo')->nullable();
            $table->string('noautores_articulo')->nullable();
            $table->string('evidenciafiliacionUpc')->nullable();
            $table->string('puntos_solicitados')->nullable();
            $table->string('bonificacion_solicitada')->nullable();
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
