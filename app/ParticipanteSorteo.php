<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class ParticipanteSorteo extends Model
{
    protected $table->('participante_sorteos');
    protected $fillable = [
    	'user_id', 'sorteo_id'
   	];

   	
}
