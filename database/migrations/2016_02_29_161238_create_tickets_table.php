<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('cantidad_tickets');
            $table->string('monto');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
