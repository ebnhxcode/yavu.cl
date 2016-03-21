<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePreguntasTable extends Migration
{
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encuesta_id');
            $table->string('pregunta');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
