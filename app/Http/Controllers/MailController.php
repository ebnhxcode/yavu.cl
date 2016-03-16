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


class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(EnviarMailRequest $request)
    {
       Mail::send('emails.contact', $request->all(), function($msj){
            $msj->subject('Correo de Contacto');
            $msj->to('contacto@yavu.cl');

        }); 

       Session::flash('message', 'Mensaje enviado correctamente, gracias :)');
       return Redirect::to('/contacto');
    }











    public function store(EnviarMailRequest $request)
    {
       Mail::send('emails.register', $request->all(), function($msj){
            $msj->subject('Correo de Registro');
            $msj->to('contacto@yavu.cl');

        }); 

       Session::flash('message', 'Debe verificar su correo para acceder a yavu.cl! )');
       return Redirect::to('/contacto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
