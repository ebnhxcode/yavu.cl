<?php

namespace yavu\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class User{
  protected $auth;
  public function __construct(Guard $auth){
    $this->auth = $auth;
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next){
    if(!Auth::user()->check()){
      Session::flash('message-info', '!Debe iniciar sesión antes de continuar!');
      return redirect()->to('login');
    }

    return $next($request);
  }
}
