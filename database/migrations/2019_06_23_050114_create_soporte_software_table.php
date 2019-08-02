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
            $table->bigIncrements('idsoporte');
            $table->unsignedBigInteger('id_software');
            $table->foreign('id_software')->references('idsoftware')->on('software');
            $table->string('instrucciones')->nullable();
            $table->string('manualusuario')->nullable();
            $table->string('ejecutable')->nullable();
            $table->string('certificado_software')->nullable();
            $table->string('CvLac')->nullable();
            $table->string('GrupLac')->nullable();
            $table->string('Certificado_impacto')->nullable();
            $table->string('Zip');
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
