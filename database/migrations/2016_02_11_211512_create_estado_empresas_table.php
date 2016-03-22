<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEstadoEmpresasTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('estado_empresas');
        Schema::create('estado_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id','20');
            $table->string('empresa_id','20');
            $table->string('status', 500);            
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('estado_empresas');
    }
}
