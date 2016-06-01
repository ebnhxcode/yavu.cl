<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class LinkBannerData extends Model
{
    protected $table = 'link_banner_data';
    protected $primaryKey = 'id';
    protected $fillable = array( 'link','titulo_link', 'banner_data_id');	
}
