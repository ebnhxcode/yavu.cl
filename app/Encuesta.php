<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Encuesta extends Model
{
    protected $table = 'encuestas';
    protected $fillable = [
    	'nombre','titulo','descripcion'
    ];
}
