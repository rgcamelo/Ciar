<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonenciaSoportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponencia_soportes', function (Blueprint $table) {
            $table->bigIncrements('idponenciasoporte');
            $table->unsignedBigInteger('idponencia');
            $table->foreign('idponencia')->references('idponencia')->on('ponencias');
            $table->string('memoriaevento')->nullable();
            $table->string('certificadoponente')->nullable();
            $table->string('Cvlacponencia')->nullable();
            $table->string('Gruplacponencia')->nullable();
            $table->string('Zipponencia');
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
        Schema::dropIfExists('ponencia__soportes');
    }
}
