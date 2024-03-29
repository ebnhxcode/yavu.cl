@section('favicon') {!!Html::favicon('favicons/newcompany.png')!!} @stop
@section('title') New company @stop
@extends('layouts.frontadm')
@section('content')
  <div class="jumbotron">
    <div class="contentMiddle">
      @include('alerts.alertFields')
      @include('empresas.forms.modalTerminosCondiciones')
      <!--
      <div class="" style="font-size: 3em;">
        <img width="8%" style="padding-bottom: 20px;" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><a href="{!! URL::to('/admins') !!}"><span>Administraci&oacute;n</span></a><span class="requerido"> \ </span><span>Crear nueva empresa</span>
      </div>
      -->
      @include('alerts.allAlerts')
      <div class="row">

        {!!Form::open(['route'=>'admins_empresas_create_path', 'method'=>'POST', 'files' => true, 'id' => 'FormEmpresa' ])!!}
        @include('admins.forms.fieldsEmpresa')
        <div class="list-group">
          <div class="list-group-item">
            <div class="form-group has-feedback has-feedback-left">
              {!! Form::checkbox('name', 'acepta', true, ['id' => 'AceptaTerminos']) !!} Aceptar <a href="#!" data-toggle="modal" data-target="#myModal" class="btn-link">términos y condiciones</a>

              {!!Form::submit('Registrar', ['class'=>'btn btn-success', 'style'=>'width:100%;', 'id' => 'Registrar'])!!}
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div><!--Este fin del div cierra el div que se abre en fieldsEmpresa-->
    </div>
  </div>
  </div>
@stop
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
  $(document).ready(function(){
    document.getElementById('FormEmpresa').onsubmit = function() {
      return false;
    }
    $("#AceptaTerminos").change( function(){
      var checked = $("input[id=AceptaTerminos]:checked").length;
      //Opcional//if($("#AceptaTerminos").is(":checked")){return:true;}
      if(checked === 0){
        $("#Registrar").attr('disabled','disabled');
      }
      else{
        $("#Registrar").removeAttr('disabled');
        document.getElementById("FormEmpresa").onsubmit = function() {
          return true;
        }
      }
    });
  });
</script>