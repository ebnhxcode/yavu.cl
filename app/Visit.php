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

  public function user(){
    return $this->belongsTo(User::class, 'user_id')->select('fecha_nacimiento');
  }

  public function interestedIn($category_id){
    return $this->hasOne(UserInterest::class, 'user_id')->select('id')->where('categorylist_id', $category_id)->get();
  }

}
