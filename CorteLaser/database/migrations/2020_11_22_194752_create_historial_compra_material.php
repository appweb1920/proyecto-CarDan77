<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialCompraMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_compra_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_material');
            $table->foreign('id_material')->references('id')->on('materiales');
            $table->string('PiezasAdquiridas');
            $table->string('GastoTotal');
            $table->softDeletes();
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
        Schema::dropIfExists('historial_compra_material');
    }
}
