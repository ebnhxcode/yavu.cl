<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateFeedsTable extends Migration
{
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id','20');
            $table->string('empresa_id','20');
            $table->string('status', 500);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('feeds');
    }
}
