<?php
namespace yavu\Http\Controllers;
use Auth;
use Hash;
use yavu\User;
use yavu\Empresa;
use yavu\RegistroCoin;
use yavu\Admin;
use Input;
use Session;
Use Redirect;
use yavu\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use DB;
class LogController extends Controller
{
    public function index()
    {
    }
    public function CargarCoinSesion($id){
        /*
        $cargaDiaria = RegistroCoin::where('user_id', $user_id)
                                    ->where('motivo', 'Inicio sesión')
                                    ->where('', '')
                                    ->first();
        */

        DB::table('registro_coins')->insert(
            ['user_id' => $id, 
            'cantidad' => '100', 
            'motivo'   => 'Inicio sesión',
            'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
            'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
    }
    public function create()
    {
    }
    public function store(LoginRequest $request)
    {
        $userEmail = User::where('email', Input::get('email'))->first();
        if(!$userEmail){
            $empresaEmail = Empresa::where('email', Input::get('email'))->first();
            if(!$empresaEmail){
                $adminEmail = Admin::where('email', Input::get('email'))->first();
                if(!$adminEmail){
                    Session::flash('message-error', 'El email ingresado no se encuentra registrado.');    
                    return Redirect::back();//->withInput()->withFlashMessage('Unknown username.');  
                }else{
                    if(Auth::admin()->attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
                        return Redirect::to('/admins');
                    }
                    Session::flash('message-error', 'Datos son incorrectos');
                    return Redirect::to('/login');                    
                }
            }else{
                if(Auth::empresa()->attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
                    return Redirect::to('/empresas');
                }
                Session::flash('message-error', 'Datos son incorrectos');
                return Redirect::to('/login');
            }
        }else{
            if(Auth::user()->attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
                $this->CargarCoinSesion(Auth::user()->get()->id);
                return Redirect::to('/dashboard');
            }
        }
        Session::flash('message-error', 'Datos son incorrectos');
        return Redirect::to('/login');
    }
    public function logout(){
        if(Auth::logout()){
            return Redirect::to('/');    
        }elseif(Auth::empresa()->logout()){
            return Redirect::to('/');
        }else{
            Session::flash('message-error', 'Ocurrió un error al cerrar la sesión.');
            return Redirect::to('/');
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
