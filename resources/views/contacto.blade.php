{!!Html::script('js/jquery.js')!!}
@extends('layouts.front')
@section('content')
<div class="colum-md-12">
  <span><a href="#!"><img  src= "{!!URL::to('img/contacto01.png')!!}" width=100%/></a></span>
</div>
{!!Form::open(['route' =>'mail.store','method'=>'POST'])!!}
<div class="jumbotron">
  <div id="contentMini">

    <div class="panel panel-default">
      <div class="panel-body">
        <h2>Contacto <img width="150" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt=""></h2>
        <hr>
          <div align="center">
            <h6>¡ANTE CUALQUIER CONSULTA NO DUDES EN CONTACTARNOS!</h6>
          </div>
        <hr>
        @include('alerts.alertFields')
        @include('alerts.errorsMessage')
        @include('alerts.successMessage')
        @include('alerts.warningMessage')
        @include('alerts.infoMessage')

        <div class="row">
          <div class="col-md-12">

            {!!Form::open()!!}
            Nombre:
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa tu nombre', 'required'=>'required'])!!}
            Email:
            {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu email', 'required'=>'required'])!!}
            Mensaje:
            {!!Form::textarea('mensaje',null,['class'=>'form-control','placeholder'=>'Ingresa tu mensaje', 'required'=>'required','rows'=>'6'])!!}
            <br>
            {!!Form::submit('Enviar', ['class' => 'btn btn-success'])!!}
            {!!Form::close()!!}


          </div>
        </div>



      </div>
    </div>
  </div>
</div>
{!!Form::close()!!}

@stop




