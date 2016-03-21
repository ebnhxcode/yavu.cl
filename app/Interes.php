<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Interes extends Model
{
    protected $table = 'intereses';
    protected $fillable = ['nombre_interes', 'descripcion_inter'];
}
