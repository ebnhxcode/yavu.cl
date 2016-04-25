<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class ParticipanteSorteo extends Model
{
    protected $table = "participante_sorteos";
    protected $fillable = [
    	"user_id", "sorteo_id", "nombre_sorteo",
   	];
  public function sorteos()
  {
    return $this->belongsTo('yavu\Sorteo');
  }

  public function users()
  {
    return $this->belongsTo('yavu\User', 'user_id');
  }

}
