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
            $table->string('tipo_libro')->nullable();
            $table->date('fecha_publicacion')->nullable();
            $table->string('editorial')->nullable();
            $table->string('isbn')->nullable();
            $table->string('idioma')->nullable();
            $table->string('noautores')->nullable();
            $table->string('resultadoPares')->nullable();
            $table->string('creditoUpc_libro')->nullable();
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
