<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre', 100);
            $table->text('Descripcion');
            $table->double('Precio', 8, 2);
            $table->unsignedInteger('Stock');
            $table->string('Imagen', 100);
            $table->unsignedInteger('TipoMueble');

            $table->foreign('TipoMueble')->references('id')->on('tipomueble')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
