<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateInteraccionesTable extends Migration
{
    public function up()
    {
        Schema::create('interacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_interaccion');
            $table->string('descripcion_interaccion',1000);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('interacciones');
    }
}
