<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  protected $table = "visits";
  protected $fillable = ['user_id', 'empresa_id','sexo'];

  public function empresa(){
    return $this->belongsTo(Empresa::class);
  }

}
