<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productividads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('docentes');
            $table->string('titulo');
            $table->unsignedBigInteger('productividadable_id');
            $table->string('productividadable_type');
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
        Schema::dropIfExists('productividads');
    }
}
