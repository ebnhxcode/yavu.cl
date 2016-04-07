@extends('layouts.front')
@section('content')
{!!Form::open(['route' => 'log.store', 'method' => 'POST'])!!}
<div class="jumbotron">
  <div id="contentMini">
    @include('alerts.warningMessage')
    @include('alerts.errorsMessage')
    @include('alerts.alertFields')
    @include('alerts.successMessage')

    
      <div id="contentMiddle">
        <h1>Login</h1>
      </div>
    <div class="panel panel-default">
      
        <div class="panel-body">
          <div class="form-group has-feedback has-feedback-left ">
            {!!Form::label('Usuario:')!!}
            {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu email de usuario'])!!}     
          </div>
          <div class="form-group has-feedback has-feedback-left ">
            {!!Form::label('Clave:')!!}
            {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa tu clave'])!!}     
          </div>
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="form-group has-feedback has-feedback-left ">
            {!!Form::submit('Acceder',['class'=>'btn btn-default ', 'style'=>'width:100%;'])!!}
          </div>
        </div>
    </div>
  </div>
</div>
{!!Form::close()!!}
@stop