<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Feed extends Model
{
    protected $table = 'feeds';
    protected $fillable = [
    	'titulo', 'descripcion'
    ];
}
