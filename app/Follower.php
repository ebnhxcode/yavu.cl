<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Follower extends Model
{
	protected $table = "followers";
	protected $fillable = [
		'user_id', 'empresa_id'
	];
}
