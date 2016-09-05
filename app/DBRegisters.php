<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class DBRegisters extends Model
{
  protected $table = "d_b_registers";
  protected $fillable = ['counter'];
}
