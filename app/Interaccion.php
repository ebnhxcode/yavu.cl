<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Interaccion extends Model
{
    protected $table = 'interacciones';
    protected $fillable = ['nombre_interaccion', 'descripcion_interaccion'];
}
