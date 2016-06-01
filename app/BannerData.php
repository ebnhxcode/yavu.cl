<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BannerData extends Model
{
    protected $table = 'banner_data';
    protected $primaryKey = 'id';
    protected $fillable = array( 'titulo_banner','descripcion_banner', 'estado_banner', 'banner');

    public function setBannerAttribute($banner){
    $name = $this->attributes['banner'] = Carbon::now()->second.$banner->getClientOriginalName();
    \Storage::disk('local')->put($name, \File::get($banner));
  }	


 
}
