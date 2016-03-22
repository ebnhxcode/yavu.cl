<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateRegistroCoinsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('registro_coins');
        Schema::create('registro_coins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id','20');
            $table->string('motivo','300');
            $table->string('cantidad','10');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('registro_coins');
    }
}
