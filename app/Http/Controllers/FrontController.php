<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use Illuminate\Support\Facades\Auth;
use yavu\Http\Controllers\Controller;
use yavu\Empresa;
use yavu\User;

class FrontController extends Controller{
  public function __construct(){
  }
  public function index(){
    return view('index');
  }
  public function login(){

    return view('login');
  } 
  public function acceso(){
    return view('acceso');
  }          
  public function registro(){
    return view('');        
  }
  public function contacto(){
    return view('contacto');        
  }
  public function nosotros(){
    return view('nosotros');        
  }
  public function terminos(){
    return view('terminos');        
  }
  public function yavucoins(){
    return view('yavucoins');        
  }
}
