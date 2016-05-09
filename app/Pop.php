<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Pop extends Model
{
    protected $table = "pops";
    protected $fillable = [
    	'user_id','empresa_id','poptype_id_helper','tipo','estado','contenido',
    ];	    
}
