@extends('layouts.front')
@section('content')
{!!Form::open(['route' => 'log.store', 'method' => 'POST'])!!}


<div class="">
  <div id="contentMini">
    @include('alerts.successMessage')
    @include('alerts.warningMessage')
    @include('alerts.errorsMessage')
    @include('alerts.alertFields')
    @include('alerts.infoMessage')

    <div>
      
        <div style="color: #fff">
          <div >
            <h2>Inicio de sesión <img width="35%" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt=""></h2>
          </div>
          <hr>
          <div class="form-group has-feedback has-feedback-left ">
            {!!Form::label('Correo electrónico:')!!}
            {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu email de usuario'])!!}     
          </div>
          <div class="form-group has-feedback has-feedback-left ">
            {!!Form::label('Clave:')!!}
            {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa tu clave'])!!}     
          </div>
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="form-group has-feedback has-feedback-left ">
            {!!Form::submit('Iniciar sesión',['class'=>'btn btn-success ', 'style'=>'width:100%;'])!!}
          </div>
          <div class="form-group has-feedback has-feedback-left ">
            <a class="btn btn-primary" style='width:100%;' href='{!! url("social/facebook") !!}'>
              <img src="{!! URL::to('/img/users/facebook.png') !!}" width="7%" alt="">
              <span>
                Registrate con Facebook
              </span>
            </a>
          </div>
          ¿No tienes una cuenta? <a class="btn-link" href="{!! URL::to('/usuarios/create') !!}">Registrate</a> es gratis!
        </div>
    </div>
  </div>
</div>
{!!Form::close()!!}
@stop