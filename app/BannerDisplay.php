<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class BannerDisplay extends Model{
  protected $table = "banner_displays";
  protected $fillable = ['banner_data_id', 'user_id'];
  
}