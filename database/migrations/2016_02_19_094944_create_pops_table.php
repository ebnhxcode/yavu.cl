<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePopsTable extends Migration
{
    public function up()
    {
        Schema::create('pops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('empresa_id');
            $table->string('tipo');
            $table->string('estado');
            $table->string('contenido');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pops');
    }
}
