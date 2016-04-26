@extends('layouts.front')
@section('content')
{!!Form::open(['route' => 'log.store', 'method' => 'POST'])!!}
<div class="jumbotron">
  <div id="contentMini">
    @include('alerts.successMessage')
    @include('alerts.warningMessage')
    @include('alerts.errorsMessage')
    @include('alerts.alertFields')
    @include('alerts.infoMessage')

    
      <div id="contentMiddle">


      </div>
    <div class="panel panel-default">
      
        <div class="panel-body">
          <div>
            <h2>Inicio de sesión</h2>
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
              <span>
                <img src="{!! URL::to('/images/facebook.png') !!}" width="7%" alt="">
                Iniciar sesión con Facebook
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