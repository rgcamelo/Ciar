<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteProductividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_productividads', function (Blueprint $table) {
            $table->bigIncrements('idprodoc');
            $table->unsignedBigInteger('iddocente');
            $table->foreign('iddocente')->references('iddocente')->on('docentes');
            $table->integer('software')->default(0);
            $table->integer('libro')->default(0);
            $table->integer('articulo')->default(0);
            $table->integer('ponencia')->default(0);
            $table->integer('videos')->default(0);
            $table->integer('videosbon')->default(0);
            $table->integer('premios')->default(0);
            $table->integer('patentes')->default(0);
            $table->integer('traducciones')->default(0);
            $table->integer('traduccionesbon')->default(0);
            $table->integer('obras')->default(0);
            $table->integer('obrasbon')->default(0);
            $table->integer('producciontecnica')->default(0);
            $table->integer('estudios')->default(0);
            $table->integer('publicacion')->default(0);
            $table->integer('reseñas')->default(0);
            $table->integer('direccion')->default(0);
            $table->integer('año')->default(0);
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
        Schema::dropIfExists('docente_productividads');
    }
}
