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
    return view('mainViews.index');
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
}
