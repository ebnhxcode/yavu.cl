@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Login @stop
@extends('layouts.front')
@section('content')
{!!Form::open(['route' => 'log.store', 'method' => 'POST'])!!}

<div class="">
  <div id="contentMini">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        @include('alerts.allAlerts')
      </div>
    </div>

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
              Registrate o Inicia sesi&oacute;n con Facebook
            </span>
          </a>
        </div>
        <div>
          ¿No tienes una cuenta? <a class="btn-link" href="{!! URL::to('/usuarios/create') !!}">Registrate</a> es gratis!
        </div>
        <div>
          ¿Problemas para iniciar sesi&oacute;n? Haz click <a data-toggle="modal" data-target="#myModal" href="#!">Aqu&iacute;</a>
        </div>
      </div>
    </div>
  </div>
</div>
{!!Form::close()!!}
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Problemas con el inicio de sesi&oacute;n</h4>
      </div>
      <div class="modal-body">
        Ingrese su correo electr&oacute;nico
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-9">
            {!!Form::open(['route'=>'usuarios_resetpassword_path', 'method'=>'POST'])!!}
            <input name="emailRenovarClave" id="emailRenovarClave" class="form-control" type="email" required="required">
            {!! csrf_field() !!}
          </div>
          <div class="col-md-3 col-sm-3 col-xs-3">
            {!!Form::submit('Renovar clave', ['class'=>'btn btn-primary btn-success', 'id' => 'RenovarClave'])!!}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@stop