<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGmapsTable extends Migration{
  public function up(){
    Schema::create('gmaps', function (Blueprint $table) {
      $table->increments('id');
      $table->string('user_id');
      $table->string('empresa_id');
      $table->string('title');
      $table->string('address', 500);
      $table->string('lat');
      $table->string('lng');
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('gmaps');
  }
}
