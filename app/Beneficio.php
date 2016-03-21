<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Beneficio extends Model
{
    protected $table = 'beneficios';
    protected $fillable = [
    	'nombre', 'descripcion'
    ];    
}
