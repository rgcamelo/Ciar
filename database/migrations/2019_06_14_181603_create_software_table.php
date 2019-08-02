<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->bigIncrements('idsoftware');
            $table->integer('noautores')->nullable();
            $table->string('autores')->nullable();
            $table->string('titulares')->nullable();
            $table->string('resultadoPares')->nullable()->nullable();
            $table->string('creditoUpc')->nullable();
            $table->string('impactanivelU')->nullable();
            $table->string('codigo')->nullable();
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
        Schema::dropIfExists('software');
    }
}
