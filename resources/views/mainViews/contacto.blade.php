@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Contacto @stop
{!!Html::script('js/jquery.js')!!}
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
    <div id="contentMini">
      <div style="color: #fff">
        <h2>Contacto <img width="150" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt=""></h2>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- /div col-md12-sm12-xs12 -->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {!!Form::open(['route' =>'mail.store','method'=>'POST'])!!}
            {!!Form::label('Nombre:')!!}
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre', 'required'=>'required'])!!}
            {!!Form::label('Email:')!!}
            {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su e-mail', 'required'=>'required'])!!}
            {!!Form::label('Mensaje:')!!}
            {!!Form::textarea('mensaje',null,['class'=>'form-control','placeholder'=>'Mensaje...', 'required'=>'required','rows'=>'6'])!!}
            <br>
            {!!Form::submit('Enviar', ['class' => 'btn btn-primary', 'style' => 'width:100%'])!!}
            {!!Form::close()!!}
          </div><!-- /div .col-md12-sm12-xs12 -->
        </div><!-- /div .row -->
        <div align="center">
          <h4>¡ANTE CUALQUIER CONSULTA NO DUDES EN CONTACTARNOS!</h4>
        </div><!-- /div aligned -->
      </div><!-- /div with style -->
    </div><!-- /div #contentMini -->
  </div><!-- /div .jumbotron -->
@stop




