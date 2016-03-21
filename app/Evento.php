<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
    	'nombre', 'descripcion'
    ];
}
