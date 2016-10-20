<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class RaffleDisplay extends Model
{
  protected $table = "raffle_displays";
  protected $fillable = ['sorteo_id', 'user_id'];

}
