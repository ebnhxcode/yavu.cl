<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class AsTheUserRegistry extends Model{
  protected $table = "as_the_user_registries";
  protected $fillable = ['user_id','asUserHear'];


}
