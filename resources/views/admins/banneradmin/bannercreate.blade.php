@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') New banner @stop
@extends('layouts.frontadm')
@section('content')
  {!!Html::script('/js/admins/admins.js')!!}
  <div class="jumbotron">
    <div class="contentMiddle">
      @include('alerts.allAlerts')
        <!--
        <div class="" style="font-size: 3em;">
          <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Crear Banner</span>
        </div>
        -->
         @include('alerts.alertFields')
          {!!Form::open(['route'=>'admins_banner_create_path', 'method'=>'POST', 'files' => true])!!}
            <input type="hidden" name="banner_data_id" value="{!! $bannerdata->id !!}">
            @include('admins.banneradmin.forms.fieldsBanner')
            {!!Form::submit('Crear', ['class'=>'btn btn-primary btn-success'])!!}
          {!!Form::close()!!}
    </div>
  </div>

@stop