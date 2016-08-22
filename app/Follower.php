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

	public function getUserFollow(){
		return $this->belongsTo(User::class, 'user_id')->select('id', 'nombre', 'imagen_perfil');
	}
	public function usersFollow(){
		return $this->belongsToMany(User::class, 'user_id')->select('id', 'nombre', 'imagen_perfil');
	}

}
