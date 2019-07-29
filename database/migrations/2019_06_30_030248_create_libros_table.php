<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('idlibro');
            $table->string('tipo_libro');
            $table->date('fecha_publicacion');
            $table->string('editorial')->nullable();
            $table->string('isbn')->nullable();
            $table->string('idioma');
            $table->string('noautores');
            $table->string('resultadoPares')->nullable();
            $table->string('creditoUpc_libro');
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
        Schema::dropIfExists('libros');
    }
}
