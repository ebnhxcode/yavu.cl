<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model{
  protected $table = "category_lists";
  protected $fillable = ['category','description'];


  public function userInteresteds(){
    return $this->hasMany(UserInterest::class, 'categorylist_id');
  }

  public function belongs_to_this_company($company_id){
    return $this->hasOne(CompanyCategory::class, 'categorylist_id')->where('empresa_id', $company_id)->get();
  }

}
