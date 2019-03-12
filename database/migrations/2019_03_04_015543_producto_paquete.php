<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_paquete', function (Blueprint $table) {
           $table->unsignedInteger('Producto');
           $table->unsignedInteger('Paquete');

           $table->foreign('Producto')->references('id')->on('producto')->onUpdate('cascade')->onDelete('cascade');
           $table->foreign('Paquete')->references('id')->on('paquete')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_paquete');
    }
}
