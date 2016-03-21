<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
