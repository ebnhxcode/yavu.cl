<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Gmap extends Model{
  protected $table = "gmaps";
  protected $fillable = ['user_id','empresa_id','address','title','lat','lng'];

  public function empresas(){
    return $this->belongsTo('yavu\Empresa', 'empresa_id');
  }
}
