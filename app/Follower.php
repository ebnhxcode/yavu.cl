<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Follower extends Model
{
	protected $table = "followers";
	protected $fillable = [
		'user_id', 'empresa_id'
	];

  public function getCompanyFollow(){
    return $this->belongsTo(Empresa::class, 'empresa_id')->select('id', 'nombre', 'imagen_perfil');
  }

}
