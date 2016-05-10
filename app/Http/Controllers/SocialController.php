<?php

namespace yavu\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\User;
use Session;
use Socialite;
use Redirect;
use Carbon\Carbon;


class SocialController extends Controller{
  public function getSocialAuth($provider){

    //dd(config("services.$provider"));

    if(!config("services.$provider")){
      abort('404');
      Session::flash('message-warning', 'No estás usando un correo publico en facebook o no tienes asociado tu email a alguna cuenta de yavu. Pero puedes registrarte facilmente <a class="btn-link" href="/usuarios/create">Aquí</a>');
      return Redirect::to('/');
    }else{

      $this->test = Socialite::driver($provider)->redirect();

      if(isset($this->test)){
        return Socialite::driver($provider)->redirect();
      }else{
        Session::flash('mesagge-warning', 'Ocurri&oacute; un error al enlazar la informaci&oacute;n');
        return Reditect::to('/login');
      }

    }
    return Socialite::driver($provider)->redirect();
  }
  //public function getSocialAuthCallback($provider=null){
  public function getSocialAuthCallback($provider){

    dd($provider);

    $user = Socialite::driver($provider)->user();

    if(isset($user) || $user =! null){

      if($user->email == null){
        $user->email = str_replace(" ","",addslashes($user->name))."@facebook.com";
      }

      $this->userLogin = User::where('email', $user->email)->first();

      if($this->userLogin) {
        if (Auth::user()->login($this->userLogin)) {
          return Redirect::to('/feeds');
        } else {
          return Redirect::to('/feeds');
        }
      }else{
        if($user->email != null){

          $userName = explode(" ",$user->name);
          $a = (count($userName) > 3) ? $userName[0]." ".$userName[1] : $userName[0];
          $b = (count($userName) > 2) ? $userName[2] : $userName[1];

          User::create([
            'nombre' => $a,
            'apellido' => $b,
            'email' => $user->email,
            'ciudad' => 'Coquimbo',
            'password' => 'yavu',
            'estado' => 'activo',
            "referido" => '',
            "referente" =>  Carbon::now()->second.
              Carbon::now()->minute.
              Carbon::now()->hour.
              Carbon::now()->year.
              Carbon::now()->month.
              Carbon::now()->day."RY",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);

          //$userLogin = User::where('email', $user->email)->first();
          $this->userLogin = User::where('email', $user->email)->first();



          $sesion = Auth::user()->attempt(['email' => $this->userLogin->email, 'password' => 'yavu', 'estado' => 'activo']);

          if($sesion){
            return Redirect::to('/dashboard');
          }else{
            Session::flash('message-warning', 'Registro finalizado. Ahora puedes iniciar sesión');
            return Redirect::to('/login');
          }
        }else{
          Session::flash('message-warning', 'No estás usando un correo publico en facebook o no tienes asociado tu email a alguna cuenta de yavu. Pero puedes registrarte facilmente <a class="btn-link" href="/usuarios/create">Aquí</a>');
          return Redirect::to('/login');
        }
      }

    }else{
      Session::flash('mesagge-info', 'Usted no tiene ningun correo publico, no podrá iniciar sesion con facebook');
      return Redirect::to('/login');
    }
  }
}
