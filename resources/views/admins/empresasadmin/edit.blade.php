@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!! $empresa->nombre !!} @stop
@extends('layouts.frontadm')
@section('content')
  <div class="jumbotron">
    <div class="contentMiddle">
      @include('alerts.alertFields')
      @include('empresas.forms.modalTerminosCondiciones')
      <!--
      <div class="" style="font-size: 3em;">
        <img width="8%" style="padding-bottom: 20px;" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><a href="{!! URL::to('/empresas') !!}"><span>Administraci&oacute;n</span></a><span class="requerido"> \ </span><span>Editar empresa</span>
      </div>
      -->
      @include('alerts.allAlerts')
      <div class="row">
        {!!Form::model($empresa, ['method'=>'PUT', 'route' => ['admins_empresas_put_path', $empresa->id], 'files' => true , 'id' => 'FormEmpresa'])!!}
        @include('admins.forms.fieldsEmpresa')
        <div class="list-group">
          <div class="list-group-item">
            <div class="form-group has-feedback has-feedback-left">

              {!!Form::submit('Guardar', ['class'=>'btn btn-success', 'style'=>'width:100%;', 'id' => 'Registrar'])!!}
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div><!--Este fin del div cierra el div que se abre en fieldsEmpresa-->
    </div>
  </div>
  </div>
@stop