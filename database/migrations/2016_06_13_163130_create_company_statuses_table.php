<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyStatusesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('company_statuses');
        Schema::create('company_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id',20);
            $table->integer('empresa_id',20);//después cambiará a company_id
            $table->string('status', 500);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('company_statuses');
    }
}
