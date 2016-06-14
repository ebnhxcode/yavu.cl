<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class EstadoEmpresa extends Model
{
    protected $table = "estado_empresas";
    protected $fillable = array('user_id','empresa_id','status');

    public function estado_empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id')->select('nombre','imagen_perfil');
    }
    public function companyPostAuthor(){
      return $this->belongsTo(Empresa::class, 'empresa_id')->select('id', 'nombre', 'imagen_perfil');
    }

    

}
