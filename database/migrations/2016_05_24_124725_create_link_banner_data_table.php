<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateLinkBannerDataTable extends Migration
{
    public function up()
    {
        Schema::create('link_banner_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link', 1000);
            $table->string('titulo_link', 50);
            $table->string('banner_data_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('link_banner_data');
    }
}

