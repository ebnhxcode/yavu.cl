<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable = array('nombre_categoria', 'hash_categoria');	
}
