<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
  protected $table = "winners";
  protected $fillable = ['user_id','sorteo_id','participante_sorteo_id','nombre','apellido'];


  public function winnerInfo(){
    return $this->belongsTo(User::class, 'user_id')->select('email','fono', 'fono_2','nombre','apellido','imagen_perfil');
  }

}
