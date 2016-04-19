<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateWinnersTable extends Migration
{
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('sorteo_id');
            $table->string('participante_sorteo_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('estado');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('winners');
    }
}
