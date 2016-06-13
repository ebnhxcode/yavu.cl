@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Login @stop
@extends('layouts.front')
@section('content')
  <style type="text/css">
    body {
      background: url(/img/users/iniciar_sesion.jpg) no-repeat fixed top center;
      background-size: 130% 100%;
      padding-top:50px;
      padding-bottom: 20px;
    }
  </style>
  <div>
    {!!Form::open(['route' => 'log.store', 'method' => 'POST'])!!}
    <div id="contentMini">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          @include('alerts.allAlerts')
        </div><!-- /div .col-md12-sm12-xs12 -->
      </div><!-- /div .row -->
      <div style="color: #fff">
        <h2>Inicio de sesión <img width="35%" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt=""></h2>
        <hr>
        <div class="form-group has-feedback has-feedback-left ">
          {!!Form::label('Correo electrónico:')!!}
          {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu email de usuario'])!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left -->
        <div class="form-group has-feedback has-feedback-left ">
          {!!Form::label('Clave:')!!}
          {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa tu clave'])!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"><!-- /input token -->
        <div class="form-group has-feedback has-feedback-left ">
          {!!Form::submit('Iniciar sesión',['class'=>'btn btn-success ', 'style'=>'width:100%;'])!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left -->
        <div class="form-group has-feedback has-feedback-left ">
          <a class="btn btn-primary" style='width:100%;' href='{!! url("social/facebook") !!}'>
            <img src="{!! URL::to('/img/users/facebook.png') !!}" width="7%" alt="">
        <span>
          Registrate o Inicia sesi&oacute;n con Facebook
        </span>
          </a><!-- /a .btn .btn-primary -->
        </div><!-- /div .form-group .has-feedback .has-feedback-left -->
        <div>
          ¿No tienes una cuenta? <a class="btn-link" href="{!! URL::to('/usuarios/create') !!}">Registrate</a> es gratis!
        </div><!-- /div -->
        <div>
          ¿Problemas para iniciar sesi&oacute;n? Haz click <a data-toggle="modal" data-target="#myModal" href="#!">Aqu&iacute;</a>
        </div><!-- /div -->
      </div><!-- /div with style -->
    </div><!-- /div #contentMini -->
    {!!Form::close()!!}
  </div><!-- /div .jumbotron -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Problemas con el inicio de sesi&oacute;n</h4>
      </div><!-- /div .modal-header -->
      <div class="modal-body">
        Ingrese su correo electr&oacute;nico
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-9">
            {!!Form::open(['route'=>'usuarios_resetpassword_path', 'method'=>'POST'])!!}
            <input name="emailRenovarClave" id="emailRenovarClave" class="form-control" type="email" required="required">
            {!! csrf_field() !!}
          </div><!-- /div .col-md9-sm9-xs9 -->
          <div class="col-md-3 col-sm-3 col-xs-3">
            {!!Form::submit('Renovar clave', ['class'=>'btn btn-primary btn-success', 'id' => 'RenovarClave'])!!}
            {!!Form::close()!!}
          </div><!-- /div .col-md3-sm3-xs3 -->
        </div><!-- /div .row -->
      </div><!-- /div .modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div><!-- /div .modal-footer -->
    </div><!-- /div .modal-content -->
  </div><!-- /div .modal-dialog -->
</div><!-- /div .modal-dialog -->
@stop