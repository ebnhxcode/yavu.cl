<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerDisplaysTable extends Migration{
  public function up(){
    Schema::create('banner_displays', function (Blueprint $table) {
      $table->increments('id');
      $table->string('banner_data_id');
      $table->string('user_id');//No el mismo dueño del banner
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('banner_displays');
  }
}
