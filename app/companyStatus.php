<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;
use Empresa;

class companyStatus extends Model
{
  protected $table = "company_statuses";
  protected $fillable = ['user_id', 'empresa_id', 'status'];

  public function estado_empresa()
  {
    return $this->belongsTo(Empresa::class, 'empresa_id')->select('id','nombre', 'imagen_perfil');
  }

  public function companyPost()
  {
    return $this->hasOne(Empresa::class, 'empresa_id')->select('id', 'nombre', 'imagen_perfil');
  }
}
