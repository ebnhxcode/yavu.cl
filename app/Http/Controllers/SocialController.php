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
  private $userLogin;
  public function getSocialAuth($provider){

    //dd(config("services.$provider"));

    if(!config("services.$provider")){
      abort('404');
      //Session::flash('message-warning', 'No estás usando un correo publico en facebook o no tienes asociado tu email a alguna cuenta de yavu. Pero puedes registrarte facilmente <a class="btn-link" href="/usuarios/create">Aquí</a>');
      Session::flash('message-info', 'Ocurri&oacute; un problema al iniciar la sesio&oacute;n con facebook.');
      return Redirect::to('/login');
    }else{


      $this->test = Socialite::driver($provider)->redirect();

      if(isset($this->test)){
        return Socialite::driver($provider)->redirect();
      }else{
        Session::flash('message-warning', 'Ocurri&oacute; un error al enlazar la informaci&oacute;n te invitamos a completar el formulario de registro manual!');
        return Redirect::to('/usuarios/create');
      }

    }
    return Socialite::driver($provider)->redirect();
  }
  //public function getSocialAuthCallback($provider=null){

  public function getSocialAuthCallback($provider){

    $user = Socialite::driver($provider)->user();

<<<<<<< HEAD
    if(!empty($user) && $user->email){
=======
    if(!empty($user) && !empty($user->email)){
>>>>>>> 3157880ffaeffbec708ee9aabc5bdac545b07c12



      $this->userLogin = User::where('email', $user->email)->first();

      if($this->userLogin){
        //Auth::user()->attempt(['email' => $this->userLogin->email, 'password' => $this->userLogin->password]);
        Auth::user()->login($this->userLogin);
        return Redirect::to('/feeds');

      }else{

        //if($user->email != null){
        if($user->email){
          $userName = explode(" ",addslashes($user->name));
          $firstName = (count($userName) > 3) ? $userName[0]." ".$userName[1] : $userName[0];
          $lastName = (count($userName) > 2) ? $userName[2] : $userName[1];

          User::create([
            'nombre' => $firstName,
            'apellido' => $lastName,
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
            Session::flash('message-warning', '<h3>Registro finalizado. Ahora debes cambiar tu <strong> clave actual, que es </strong>: <small>yavu</small></h3>  ');
            return Redirect::to('/usuarios/'.$this->userLogin->id.'/edit');
          }else{
            Session::flash('message-warning', '<h3>Registro finalizado. Ahora puedes iniciar sesión. Tu <strong> clave actual, que es </strong>: <small>yavu</small> Recuerda modificarla desde tu perfil </h3>');
            return Redirect::to('/login');
          }

        }else{
          Session::flash('message-warning', '<h2>Estimado usuario:</h2> <h3>Su configuración de seguridad en facebook no nos permite realizar el registro, le invitamos a utiliar el siguiente formualario para registrarse.</h3>');
          return Redirect::to('/usuarios/create');
        }

      }

    }else{
      Session::flash('message-info', '<h3>Usted no tiene ningun correo publico, no podrá iniciar sesion con facebook, te invitamos a registrarte a trav&eacute;s de nuestro formulario.</h3>');
      return Redirect::to('/usuarios/create');
    }
  }
}
