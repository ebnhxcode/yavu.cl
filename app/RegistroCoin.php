<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class RegistroCoin extends Model
{
    protected $table = "registro_coins";
    protected $fillable = array('user_id','motivo','cantidad');	
}
