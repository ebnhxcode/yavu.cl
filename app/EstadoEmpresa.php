<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class EstadoEmpresa extends Model
{
    protected $table = "estado_empresas";
    protected $fillable = array('user_id','empresa_id','status');	
}
