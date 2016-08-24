<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model{
  protected $table = "category_lists";
  protected $fillable = ['category','description'];

}
