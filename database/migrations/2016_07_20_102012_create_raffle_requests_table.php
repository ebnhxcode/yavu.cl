<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaffleRequestsTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('raffle_requests', function (Blueprint $table) {
          $table->increments('id');
          $table->string('user_id');
          $table->string('empresa_id');
          $table->timestamps();
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('raffle_requests');
  }
}
