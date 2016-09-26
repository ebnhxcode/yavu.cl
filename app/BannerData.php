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

  public function linksBannerData (){
  	return $this->hasMany(LinkBannerData::class, 'banner_data_id');
  }

  public function companyId(){
    return $this->belongsTo(Empresa::class, 'empresa_id')->select('id');
  }

  public function companyName(){
    return $this->belongsTo(Empresa::class, 'empresa_id')->select('nombre');
  }

  public function displays(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id');
  }

  public function displays_in_day(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subHours(24));
  }
  public function displays_in_twodays(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subDays(2));
  }
  public function displays_in_threedays(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subDays(3));
  }
  public function displays_in_fourdays(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subDays(4));
  }
  public function displays_in_fivedays(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subDays(5));
  }
  public function displays_in_sixdays(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subDays(6));
  }

  public function displays_in_week(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subWeek());
  }

  public function displays_in_twoweeks(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subWeeks(2));
  }
  public function displays_in_threeweeks(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subWeeks(3));
  }
  public function displays_in_fourweeks(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subWeeks(4));
  }

  public function displays_in_month(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subMonth());
  }

  public function displays_in_threemonths(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subMonths(3));
  }

  public function displays_in_fourmonths(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subMonths(4));
  }

  public function displays_in_sixmonths(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subMonths(6));
  }

  public function displays_in_year(){
    return $this->hasMany(BannerDisplay::class, 'banner_data_id')->where('created_at', '>', Carbon::now()->subYear());
  }

  /*public function companyFollowers($empresa_id){
    return $this->hasMany(Follower::class, 'empresa_id')->select('id')->where('empresa_id', $empresa_id)->get();
  }*/

 
}
