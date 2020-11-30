<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre');
            $table->string('DescripcionUso');
            $table->string('CostoPieza');
            $table->string('TipoMaterial');
            $table->string('imagen');
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
        Schema::dropIfExists('materiales');
    }
}
