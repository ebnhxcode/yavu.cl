<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class RaffleRequest extends Model
{
  protected $table = "raffle_requests";
  protected $fillable = ['user_id', 'empresa_id'];
  
}
