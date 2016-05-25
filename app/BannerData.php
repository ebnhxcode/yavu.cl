<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class BannerData extends Model
{
    protected $table = 'banner_data';
    protected $primaryKey = 'id';
    protected $fillable = array( 'titulo_banner','descripcion_banner', 'estado_banner', 'banner', 'empresa_id');	
}
