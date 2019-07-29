<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponencias', function (Blueprint $table) {
            $table->bigIncrements('idponencia');
            $table->string('nombreevento')->nullable();
            $table->date('fechaevento')->nullable();
            $table->string('lugarevento')->nullable();
            $table->string('tipoevento')->nullable();
            $table->string('idiomaponencia')->nullable();
            $table->string('noautores_ponencia')->nullable();
            $table->string('paginaevento')->nullable();
            $table->string('creditoUpc_ponencia')->nullable();
            $table->string('memorias')->nullable();
            $table->string('issn')->nullable();
            $table->string('isbn')->nullable();
            $table->string('ponenciasreconocidas')->nullable();
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
        Schema::dropIfExists('ponencias');
    }
}
