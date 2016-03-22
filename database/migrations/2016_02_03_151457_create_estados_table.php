<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEstadosTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('estados');
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id','20');
            $table->string('status', 500);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('estados');
    }
}
