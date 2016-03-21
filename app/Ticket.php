<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
    	'user_id', 'cantidad_tickets', 'monto'
    ];

}
