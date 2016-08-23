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

}
