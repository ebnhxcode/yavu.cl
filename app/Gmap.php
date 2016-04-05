<?php
namespace yavu;
use Illuminate\Database\Eloquent\Model;
class Gmap extends Model{
  protected $table = "gmaps";
  protected $fillable = ['title','lat','lng'];
}
