<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEncuestasTable extends Migration
{
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('titulo');
            $table->string('descripcion',1000);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('encuestas');
    }
}
