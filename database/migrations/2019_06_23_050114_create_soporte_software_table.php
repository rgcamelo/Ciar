<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoporteSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soporte_software', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_software');
            $table->foreign('id_software')->references('id')->on('software');
            $table->string('instrucciones');
            $table->string('manualusuario');
            $table->string('ejecutable');
            $table->string('certificado_software');
            $table->string('CvLac');
            $table->string('GrupLac');
            $table->string('Certificado_impacto');
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
        Schema::dropIfExists('soporte_software');
    }
}
