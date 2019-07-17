<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoInvestigacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_investigacions', function (Blueprint $table) {
            $table->bigIncrements('idgrupo');
            $table->string('NombreGrupo');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('iddepartamento')->on('departamentos');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('idcategoria')->on('categorias');
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
        Schema::dropIfExists('grupo_investigacions');
    }
}
