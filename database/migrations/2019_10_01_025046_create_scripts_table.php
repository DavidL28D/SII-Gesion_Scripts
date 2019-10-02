<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 20);
            $table->string('argumentos', 50)->nullable();
            $table->string('retorno', 50)->nullable();
            $table->string('descripcion', 50);
            $table->string('permisos', 3);
            $table->date('creacion');
            $table->integer('empresa_id')->references('id')->on('companies');
            $table->integer('script_id')->references('id')->on('scripts');
            $table->integer('lenguaje_id')->references('id')->on('languages');
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
        Schema::dropIfExists('scripts');
    }
}
