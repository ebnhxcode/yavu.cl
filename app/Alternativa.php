<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Alternativa extends Model
{
    protected $table = 'alternativas';
    protected $fillable = [
    	'encuesta_id', 'pregunta_id', 'alternativa'
    ];
}
