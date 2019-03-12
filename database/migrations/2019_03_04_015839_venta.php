<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Venta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table){
            $table->increments('id');
            $table->date('Fecha');
            $table->unsignedInteger('Cantidad');
            $table->double('Total', 8, 2);
            $table->unsignedInteger('Descuento')->nullable();
            $table->unsignedInteger('Usuario');
            $table->unsignedInteger('Producto')->nullable();
            $table->unsignedInteger('Paquete')->nullable();
            $table->softDeletes();

            $table->foreign('Usuario')->references('id')->on('users');
            $table->foreign('Producto')->references('id')->on('producto');
            $table->foreign('Paquete')->references('id')->on('paquete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
