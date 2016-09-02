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
	public function getGenre(){
		return $this->belongsTo(User::class, 'user_id')->select('sexo');
	}

	public function getUserFollow(){
		return $this->belongsTo(User::class, 'user_id')->select('id', 'nombre', 'apellido', 'imagen_perfil');
	}
	public function usersFollow(){
		return $this->belongsToMany(User::class, 'user_id')->select('id', 'nombre', 'imagen_perfil');
	}

	public function interestedIn($category_id){
		return $this->belongsTo(UserInterest::class, 'user_id')->where('categorylist_id', $category_id)->get();
	}

	public function participatedIn($raffle_id){
		return $this->hasMany(ParticipanteSorteo::class, 'user_id')->select('id', 'user_id')->where('sorteo_id', $raffle_id)->get();
	}
}
