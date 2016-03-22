<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Estado extends Model
{
    protected $table = "estados";
    protected $fillable = array('status','user_id');

}
