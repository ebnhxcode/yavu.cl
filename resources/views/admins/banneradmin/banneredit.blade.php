@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit banner @stop
@extends('layouts.frontadm')
@section('content')
  {!!Html::script('/js/admins/admins.js')!!}
  <div class="jumbotron">
    <div class="contentMiddle">
      @include('alerts.allAlerts')
        <!--
        <div class="" style="font-size: 3em;">
          <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Editar Banner</span>
        </div>
        -->

         @include('alerts.alertFields')

          {!!Form::open(['route'=>'admins_banner_put_path', 'method'=>'PUT', 'files' => true])!!}
            <input type="hidden" name="banner_data_id" value="{!! $bannerdata->id !!}">
            @include('admins.banneradmin.forms.fieldsBanner')
            {!!Form::submit('Crear', ['class'=>'btn btn-primary btn-success'])!!}
          {!!Form::close()!!}
    </div>
  </div>

@stop