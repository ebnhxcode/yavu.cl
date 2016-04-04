<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Vendor extends Model{
  protected $table = "vendors";
  protected $fillable = ['title','lat','lng'];

}
