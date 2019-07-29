<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloSoportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_soportes', function (Blueprint $table) {
            $table->bigIncrements('idsoportearticulo');
            $table->unsignedBigInteger('idarticulo');
            $table->foreign('idarticulo')->references('id_articulo')->on('articulos');
            $table->string('ejemplar_articulo')->nullable();
            $table->string('Cvlac_articulo')->nullable();
            $table->string('Gruplac_articulo')->nullable();
            $table->string('Evidenciarevista')->nullable();
            $table->string('Zip_articulo');
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
        Schema::dropIfExists('articulo__soportes');
    }
}
