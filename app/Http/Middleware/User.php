<?php

namespace yavu\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use Session;

class User{
  protected $auth;
  protected $user;
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
    try {
      if (Auth::user()->guest()) {
        return redirect()->guest('/');
        /*
        if ($request->ajax()) {
          return response('Unauthorized.', 401);
        } else {
          //Session::flash('message-info', '¡Debe iniciar sesión antes de continuar!');
          return redirect()->guest('/');
        }
        */
      }
    } catch (Exception $e) {
      throw new $e->getMessage();
    } finally {
      return $next($request);
    }
  }
}
