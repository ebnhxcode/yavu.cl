<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCategoryBannerDataTable extends Migration
{
    public function up()
    {
        Schema::create('category_banner_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 20);  
            $table->string('banner_data_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('category_banner_data');
    }
}


