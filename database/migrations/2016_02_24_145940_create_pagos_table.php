<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePagosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('descripcion', 1000);
            $table->integer('monto');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
