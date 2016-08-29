<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model{
  protected $table = "category_lists";
  protected $fillable = ['category','description'];


  public function userInteresteds(){
    return $this->hasMany(UserInterest::class, 'categorylist_id');
  }
}
