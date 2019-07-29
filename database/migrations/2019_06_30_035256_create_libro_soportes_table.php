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
            $table->string('ejemplar')->nullable();
            $table->string('Cvlac_libro')->nullable();
            $table->string('Gruplac_libro')->nullable();
            $table->string('Certificadolibrodeinvestigacion')->nullable();
            $table->string('Certificadoeditorial')->nullable();
            $table->string('Zip_libro');
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
