<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
  protected $table = "winners";
  protected $fillable = ['user_id','sorteo_id','participante_sorteo_id','nombre','apellido'];

}
