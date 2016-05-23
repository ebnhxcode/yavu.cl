@extends('layouts.frontadm')
@section('content')
  {!!Html::script('/js/admins/admins.js')!!}
  <div class="jumbotron">
    <div id="contentMiddle">
      @include('alerts.alertFields')
      @include('alerts.errorsMessage')
      @include('alerts.successMessage')
      @include('alerts.warningMessage')

      <div class="" style="font-size: 3em;">
        <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Asignar Banner</span>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="list-group">

              <div class="list-group-item list-group-item-success">
                <h5>Empresas para asignar Banner<span id="resizePendingCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div>

            </div> <!-- /list group -->

        </div>
      </div>
    </div>
  </div>

@stop