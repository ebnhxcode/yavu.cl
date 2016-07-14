<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('admins');
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 200)->unique();
            $table->string('nombre', 100);
            $table->string('apellido', 100);          
            $table->string('password', 100);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
