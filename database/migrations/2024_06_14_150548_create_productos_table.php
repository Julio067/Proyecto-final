<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productos_id')->unsigned();
            $table->foreign('productos_id')->references('id')->on('users');
            $table->string('nombre');
            $table->string('descripcion');
            $table->bigInteger('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias');
            $table->integer('precio');
            $table->integer('cantidad');
            $table->string('medida');
            $table->string('imagen');
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
        Schema::dropIfExists('productos');
    }
}
