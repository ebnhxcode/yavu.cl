<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateBeneficiosTable extends Migration
{
    public function up()
    {
        Schema::create('beneficios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion',1000);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('beneficios');
    }
}
