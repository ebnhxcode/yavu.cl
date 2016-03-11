{!!Html::script('js/jquery.js')!!}
@extends('layouts.front')
@section('content')
@include('alerts.alertFields')
@include('alerts.errorsMessage')
@include('alerts.successMessage')
@include('alerts.warningMessage')

{!!Form::open(['route' =>'mail.store','method'=>'POST'])!!}
<div class="jumbotron">
  <div id="contentIn">
    <h1>Contacto</h1>
    <div class="panel panel-default">
   
      <div class="panel-body">
             <td colspan="2">Contactanos!</td>
             
        {!!Form::open()!!}
        <table class="table">
          <tr>
            <td>Nombre:</td>
            <td>
              {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa tu nombre', 'required'=>'required'])!!}
            </td>
          </tr>
          <tr>
            <td>Email:</td>
            <td>
              {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu email', 'required'=>'required'])!!}
            </td>

          </tr>
          <tr>
            <td>Mensaje:</td>
            <td>
              {!!Form::textarea('mensaje',null,['class'=>'form-control','placeholder'=>'Ingresa tu mensaje', 'required'=>'required','rows'=>'3'])!!}                      
            </td>
          </tr>
        </table>

        {!!Form::submit('Enviar')!!}
        {!!Form::close()!!}
      </div>
    </div>  
  </div>
</div>
{!!Form::close()!!}

@stop




