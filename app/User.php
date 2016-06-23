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
class User extends Model implements AuthenticatableContract,
																		AuthorizableContract,
																		CanResetPasswordContract
{
		use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;
		protected $table = 'users';
		protected $primaryKey = 'id';
		protected $fillable = ['rut', 'email', 'login', 'nombre', 'apellido', 'direccion', 'ciudad', 'region', 'pais', 'fono', 'fono_2', 'sexo', 'fecha_nacimiento', 'password', 'estado', 'tipo_usuario','referido', 'referente', 'validacion' , 'imagen_perfil', 'imagen_portada'];
		protected $hidden = ['password', 'remember_token'];
		protected $dates = ['deleted_at'];

		public function setPasswordAttribute($valor){
				if(!empty($valor)){
					$this->attributes['password'] = \Hash::make($valor);
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

	public function participante_sorteos(){
		return $this->hasOne('yavu\ParticipanteSorteo');
	}
	public function registro_coins(){
		return $this->hasMany(RegistroCoin::class);
	}
	public function registro_tickets(){
		return $this->hasMany(Ticket::class);
	}
	public function registro_participante_sorteos(){
		return $this->hasMany(ParticipanteSorteo::class);
	}
	public function pops(){
		return $this->hasMany(Pop::class)->orderBy('created_at', 'desc');
	}
	public function tickets(){
		return $this->hasMany(Ticket::class, 'user_id');
	}
	public function empresas (){
		return $this->hasMany(Empresa::class)->select('id','user_id','nombre','estado','imagen_perfil');
	}
  public function userCompanies(){
    return $this->hasMany(Empresa::class, 'user_id')->select('id','user_id','nombre','estado','imagen_perfil');
  }
	public function companiesForPost(){
		return $this->hasMany(Empresa::class)->select('id','imagen_perfil');
	}

	public function sorteos(){
		return $this->hasMany(Sorteo::class);
	}

	public function coinsRewarded(){
		return $this->hasMany(InteraccionEstado::class, 'user_id');
	}

	public function follow($empresa_id){
		return $this->hasOne(Follower::class, 'user_id')->where('empresa_id', $empresa_id);
	}
}
