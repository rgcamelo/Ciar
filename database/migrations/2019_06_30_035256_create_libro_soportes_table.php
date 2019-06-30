<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibroSoportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_soportes', function (Blueprint $table) {
            $table->bigIncrements('id_soportelibro');
            $table->unsignedBigInteger('id_libro');
            $table->foreign('id_libro')->references('idlibro')->on('libros');
            $table->string('ejemplar');
            $table->string('Cvlac_libro');
            $table->string('Gruplac_libro');
            $table->string('Certificadolibrodeinvestigacion');
            $table->string('Certificadoeditorial');
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
        Schema::dropIfExists('libro__soportes');
    }
}
