<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre_categoria', 'hash_categoria', 'empresa_id'];	


	   public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

}