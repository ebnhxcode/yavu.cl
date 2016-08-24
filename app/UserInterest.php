<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
  protected $table = 'user_interests';
  protected $fillable = [
    'user_id', 'categorylist_id',
  ];

  public function categoryList(){
    return $this->belongsTo(CategoryList::class, 'categorylist_id');
  }

  public function follow_this_company($empresa_id){
    return $this->hasOne(Follower::class, 'user_id')->select('id')->where('empresa_id', $empresa_id)->get();

  }

}
