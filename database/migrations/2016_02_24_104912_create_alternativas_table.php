<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAlternativasTable extends Migration
{
    public function up()
    {
        Schema::create('alternativas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encuesta_id');
            $table->integer('pregunta_id');
            $table->string('alternativa');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('alternativas');
    }
}
