<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
    	'nombre', 'descripcion'
    ];    
}
