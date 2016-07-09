<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Session;
use Carbon\Carbon;
class Sorteo extends Model{
  use Authorizable;
  protected $table = 'sorteos';
  protected $primaryKey = 'id';
  protected $fillable = ['user_id', 'empresa_id', 'nombre_empresa', 'nombre_sorteo', 'descripcion', 'fecha_inicio_sorteo', 'estado_sorteo', 'imagen_sorteo'];
  public function setImagenSorteoAttribute($imagen_sorteo){
    $this->attributes['imagen_sorteo'] = Carbon::now()->second.$imagen_sorteo->getClientOriginalName();
    $name = Carbon::now()->second.$imagen_sorteo->getClientOriginalName();
    \Storage::disk('local')->put($name, \File::get($imagen_sorteo));
  }

  public function setEstadoSorteoAttribute($estado_sorteo){
    if(isset($estado_sorteo)) {
      $estado_sorteo = addslashes($estado_sorteo);
      if ($estado_sorteo == 0) {
        $this->attributes['estado_sorteo'] = 'Pendiente';
      } else if ($estado_sorteo == 1) {
        $this->attributes['estado_sorteo'] = 'Activo';
      } else if ($estado_sorteo == 2) {
        $this->attributes['estado_sorteo'] = 'Finalizado';
      } else {
        $this->attributes['estado_sorteo'] = 'Pendiente';
      }
    }
  }

/*al final no se llego a nada pero dejo el codigo por si acaso
  public function setFechaInicioSorteoAttribute($fecha_inicio_sorteo){
    $date = Carbon::createFromDate(1970,19,12);
    $this->attributes['fecha_inicio_sorteo'] = ;
  }
*/
  public function participants(){
    return $this->hasMany(ParticipanteSorteo::class, 'sorteo_id')->select('sorteo_id');
  }
  public function participante_sorteos(){
    return $this->hasMany('yavu\ParticipanteSorteo', 'sorteo_id');
  }
  public function winners(){
    return $this->hasMany(Winner::class, 'sorteo_id');
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
  public function empresa(){
    return $this->belongsTo(Empresa::class);
  }

  public function companyAuthorRaffle(){
    return $this->belongsTo(Empresa::class, 'empresa_id')->select('imagen_perfil');
  }
}