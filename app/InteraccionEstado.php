<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class InteraccionEstado extends Model
{
	protected $table = "interaccion_estados";
    protected $fillable = array('user_id','status_id');	    
}
