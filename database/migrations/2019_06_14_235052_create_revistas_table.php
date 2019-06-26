<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revistas', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->unsignedBigInteger('id_tipo');
            //$table->foreign('id_tipo')->references('id')->on('tipo_revistas');
            //$table->date('FechaPublicacion');
            //$table->string('ISSN');
            //$table->string('idioma');
            $table->integer('numeroAutores');
            //$table->boolean('filiacionUpc');
            //$table->string('puntosSolicitados');
            //$table->string('Bonificacion');
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
        Schema::dropIfExists('revistas');
    }
}
