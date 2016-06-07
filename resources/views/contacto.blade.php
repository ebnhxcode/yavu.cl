@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Contact @stop
{!!Html::script('js/jquery.js')!!}
@extends('layouts.front')
@section('content')

<div class="">
  <div id="contentMini">

    <div style="color: #fff">
      <div>
        <h2>Contacto <img width="150" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt=""></h2>

        @include('alerts.allAlerts')

        <div class="row">
          <div class="col-md-12">
            {!!Form::open(['route' =>'mail.store','method'=>'POST'])!!}
            Nombre:
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre', 'required'=>'required'])!!}
            Email:
            {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su e-mail', 'required'=>'required'])!!}
            Mensaje:
            {!!Form::textarea('mensaje',null,['class'=>'form-control','placeholder'=>'Tema...', 'required'=>'required','rows'=>'6'])!!}
            <br>
            {!!Form::submit('Enviar', ['class' => 'btn btn-primary'])!!}
            {!!Form::close()!!}

          </div>
        </div>

        <div align="center">
          <h4>¡ANTE CUALQUIER CONSULTA NO DUDES EN CONTACTARNOS!</h4>
        </div>



      </div>
    </div>
  </div>
</div>


@stop




