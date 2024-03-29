<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\DBRegisters;
use yavu\Http\Requests;
use Illuminate\Support\Facades\Auth;
use yavu\Http\Controllers\Controller;
use yavu\Empresa;
use yavu\Sorteo;
use yavu\BannerData;

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
  public function loginMassive(){
    DBRegisters::create(['counter'=>1])->save();
    return view('mainViews.login');
  }
  public function sorteosActivos(){
    return view('mainViews.sorteosActivos', ['sorteos'=>Sorteo::orderBy('id', 'desc')->where('estado_sorteo','Activo')->paginate(15)]);
  }
  public function sorteosFinalizados(){
    return view('mainViews.sorteosFinalizados', ['sorteos'=>Sorteo::orderBy('id', 'desc')->where('estado_sorteo','Finalizado')->paginate(15)]);
  }
  public function sorteo($id){
    $this->sorteo = Sorteo::find(addslashes($id));
    $winners = $this->sorteo->winners()->get();

    if(count($winners)>0){
      return view('mainViews.sorteo', ['sorteo' => $this->sorteo, 'winners' => $winners]);
    }else{
      return view('mainViews.sorteo', ['sorteo' => $this->sorteo]);
    }

  }
  public function terminos(){
    return view('mainViews.terminos');
  }
  public function yavucoins(){
    return view('mainViews.yavucoins');
  }
  public function yavu(){
    return view('mainViews.yavu', ['companies' => Empresa::select('id','nombre','imagen_perfil')->where('imagen_perfil','!=','')->orderByRaw('RAND()')->take(20)->get()]);
  }
  public function faq(){
    return view('mainViews.faq');
  }
}
