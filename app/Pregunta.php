<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Pregunta extends Model
{
   	protected $table = 'preguntas';
   	protected $fillable = [
   		'encuesta_id','pregunta'
   	];
}
