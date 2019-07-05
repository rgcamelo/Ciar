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
            $table->string('nombreevento');
            $table->date('fechaevento');
            $table->string('lugarevento');
            $table->string('tipoevento');
            $table->string('idiomaponencia');
            $table->string('noautores_ponencia');
            $table->string('paginaevento');
            $table->string('creditoUpc_ponencia');
            $table->string('memorias');
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
