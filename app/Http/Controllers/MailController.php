<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Redirect;
use Session;
use yavu\Http\Requests;
use yavu\Http\Requests\EnviarMailRequest;
use yavu\Http\Controllers\Controller;
use Illuminate\Routing\Route;
class MailController extends Controller{
  public function index(){
  }
  public function create(){
  }
  public function destroy($id){
  }
  public function edit($id){
  }
  public function show($id){
  }
  public function store(EnviarMailRequest $request){
    Mail::send('emails.contact', $request->all(), function($msj){
      $msj->subject('Correo de Contacto');
      $msj->to('contacto@yavu.cl');
    });
    Session::flash('message', 'Mensaje enviado correctamente, gracias :)');
    return Redirect::to('/contacto');
  }
  public function update(Request $request, $id){
  }
}
