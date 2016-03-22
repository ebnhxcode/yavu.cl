<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('banners');
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner_empresa', 200);
            $table->string('enlace_empresa', 100);
            $table->string('imagen_empresa', 100);   
            $table->string('comentario_banner', 100);   
            $table->string('estado_banner',30);       
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('banners');
    }
}
