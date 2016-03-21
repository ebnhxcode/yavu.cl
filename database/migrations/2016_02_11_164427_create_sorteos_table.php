<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSorteosTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('sorteos');
        Schema::create('sorteos', function (Blueprint $table) {
            $table->increments('id');                     
            $table->string('nombre_sorteo', 100);
            $table->string('descripcion', 500);          
            $table->string('fecha_inicio_sorteo', 100);
            $table->string('estado_sorteo',30);
            $table->string('imagen_sorteo');           
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('sorteos');
    }
}
