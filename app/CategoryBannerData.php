<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class CategoryBannerData extends Model
{
    protected $table = 'category_banner_data';
    protected $primaryKey = 'id';
    protected $fillable = array( 'banner_data_id','category');	
}
