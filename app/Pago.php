<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Pago extends Model
{
    protected $table = 'pagos';
    protected $fillable = [
    	'user_id', 'descripcion', 'monto'
    ];
}
