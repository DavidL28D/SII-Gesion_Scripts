<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptsSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scripts_sos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('script_id')->references('id')->on('scripts')->nullable();
            $table->integer('so_id')->references('id')->on('sos');
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
        Schema::dropIfExists('scripts_sos');
    }
}
