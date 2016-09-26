<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaffleDisplaysTable extends Migration{
  public function up(){
    Schema::create('raffle_displays', function (Blueprint $table) {
      $table->increments('id');
      $table->string('sorteo_id');
      $table->string('user_id');//No el mismo dueño del sorteo
      $table->timestamps();
    });
  }

  public function down(){
    Schema::drop('raffle_displays');
  }
}
