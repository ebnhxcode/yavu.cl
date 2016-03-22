<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Carbon\Carbon;
class Sorteo extends Model
{
   	use Authorizable;
     protected $table = 'sorteos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre_sorteo', 'descripcion', 'fecha_inicio_sorteo', 'estado_sorteo', 'imagen_sorteo'];

    public function setImagenSorteoAttribute($imagen_sorteo)
    {
        $this->attributes['imagen_sorteo'] = Carbon::now()->second.$imagen_sorteo->getClientOriginalName();

        $name = Carbon::now()->second.$imagen_sorteo->getClientOriginalName();
        
        \Storage::disk('local')->put($name, \File::get($imagen_sorteo));
    } 

}