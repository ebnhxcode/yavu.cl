@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Contact @stop
{!!Html::script('js/jquery.js')!!}
@extends('layouts.front')
@section('content')
  <div id="contentMini">
    <div style="color: #fff">
      <h2>Contacto <img width="150" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt=""></h2>
      @include('alerts.allAlerts')
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
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
@stop




