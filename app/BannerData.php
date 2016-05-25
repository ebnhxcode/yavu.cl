<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner_data';
    protected $primaryKey = 'banner_data_id';
    protected $fillable = array( 'titulo_banner','descripcion_banner', 'estado_banner','empresa_id', 'link_id');	
}
