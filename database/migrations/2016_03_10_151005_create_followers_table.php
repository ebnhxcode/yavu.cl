<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateFollowersTable extends Migration
{
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('empresa_id');
            $table->string('estado');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
