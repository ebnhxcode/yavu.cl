<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateBannerDataTable extends Migration
{
    public function up()
    {
        Schema::create('banner_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_banner', 20);
            $table->string('descripcion_banner', 80);
            $table->string('estado_banner');  
            $table->string('empresa_id');
            $table->string('link_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('banner_data');
    }
}

