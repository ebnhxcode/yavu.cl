<?php

namespace yavu;

use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
  protected $table = "company_categories";
  protected $fillable = ['empresa_id', 'categorylist_id'];
}
