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
  //necesito crear un redireccion desde el controller que cuando se solicite el @index y esté logeado un usuario mande al dashboard
  //si no está logeado que mande al mainViews.index. similar a lo que traté de hacer aquí abajo pero no funciona, envía a main siempre
  public function index() {
    if (Auth::check()){
      return redirect()->to('/dashboard');
    }else{
      return view('mainViews.index');
    }

  }
  public function login(){
    return view('mainViews.login');
  }
  public function contacto(){
    return view('mainViews.contacto');
  }
  public function nosotros(){
    return view('mainViews.nosotros');
  }
  public function terminos(){
    return view('mainViews.terminos');
  }
  public function yavucoins(){
    return view('mainViews.yavucoins');
  }
  public function faq(){
    return view('mainViews.faq');
  }
}
