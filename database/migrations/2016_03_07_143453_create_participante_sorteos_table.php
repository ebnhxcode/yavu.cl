<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateParticipanteSorteosTable extends Migration
{
    public function up()
    {
        Schema::create('participante_sorteos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('sorteo_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('participante_sorteos');
    }
}
