<?php
namespace yavu;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Carbon\Carbon;
class Empresa extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;
    protected $table = "empresas";
    protected $primaryKey = 'id';
    protected $fillable = ['rut', 'email', 'login', 'nombre', 'descripcion','direccion', 'ciudad', 'region', 'pais', 'fono', 'fono_2', 'fecha_creacion', 'tipo_servicio','fecha_de_pago','nombre_encargado', 'user_id', 'estado', 'imagen_perfil', 'imagen_portada'];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['deleted_at'];
    public function setPasswordAttribute($valor){
        if(!empty($valor)){
          $this->attributes['password'] = \Hash::make($valor);
        }
    }

     public function scopeNombre($query, $nombre)
    {   
        if (trim($nombre) != ""){
            $query->where('nombre', 'like' , '%'.$nombre.'%');
        }
        
    }
    public function setImagenPerfilAttribute($imagen_perfil)
    {
        $this->attributes['imagen_perfil'] = Carbon::now()->second.$imagen_perfil->getClientOriginalName();

        $name = Carbon::now()->second.$imagen_perfil->getClientOriginalName();

        \Storage::disk('local')->put($name, \File::get($imagen_perfil));
    }
    public function setImagenPortadaAttribute($imagen_portada)
    {
        $this->attributes['imagen_portada'] = Carbon::now()->second.$imagen_portada->getClientOriginalName();

        $name = Carbon::now()->second.$imagen_portada->getClientOriginalName();
        
        \Storage::disk('local')->put($name, \File::get($imagen_portada));
    }

    public function banners(){
      return $this->hasMany(BannerData::class, 'empresa_id');
    }

    public function inactiveBanners(){
        return $this->hasMany(BannerData::class, 'empresa_id')->where('estado_banner', 'Inactivo');
    }

    public function charges(){
      return $this->hasMany(InteraccionEstado::class, 'empresa_id');
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function gmaps(){
      return $this->hasOne('yavu\Gmap');
    }
    public function followers(){
      return $this->hasMany(Follower::class, 'empresa_id');
    }


    public function feeds(){
      return $this->hasMany(EstadoEmpresa::class, 'empresa_id');
    }

    public function isFollowedBy($user_id){
        return $this->hasMany(Follower::class, 'empresa_id')->select('user_id')->where('user_id', $user_id)->get();
    }
    public function sorteos(){
        return $this->hasMany(Sorteo::class, 'empresa_id')->select('empresa_id')->where('estado_sorteo', 'Activo');
    }
    public function rafflesEnded(){
        return $this->hasMany(Sorteo::class, 'empresa_id')->select('id','empresa_id','nombre_sorteo')->where('estado_sorteo', 'Finalizado');
    }
    public function rafflesActive(){
        return $this->hasMany(Sorteo::class, 'empresa_id')->select('id','empresa_id','nombre_sorteo')->where('estado_sorteo', 'Activo');
    }
    public function estado_empresas(){
        return $this->hasMany(EstadoEmpresas::class, 'empresa_id');
    }

    public function visits(){
        return $this->hasMany(Visit::class, 'empresa_id');
    }
    public function otherVisits(){
        return $this->hasMany(Visit::class, 'empresa_id')->where('sexo', 'Otro');
    }
    public function menVisits(){
        return $this->hasMany(Visit::class, 'empresa_id')->where('sexo', 'Masculino');
    }

    public function womenVisits(){
        return $this->hasMany(Visit::class, 'empresa_id')->where('sexo', 'Femenino');
    }


    public function coins_otorgadas(){
        return $this->hasMany(InteraccionEstado::class, 'empresa_id');
    }

    public function categorias(){
        return $this->hasMany(CompanyCategory::class, 'empresa_id');
    }

    public function myCategories(){
        return $this->hasMany(CompanyCategory::class, 'empresa_id');
    }

    public function raffleRequests(){
        return $this->hasMany(RaffleRequest::class, 'empresa_id');
    }
}



