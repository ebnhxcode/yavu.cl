<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteraccionEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('interaccion_estados');
        Schema::create('interaccion_estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',20);
            $table->string('status_id',20);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('interaccion_estados');
    }
}
