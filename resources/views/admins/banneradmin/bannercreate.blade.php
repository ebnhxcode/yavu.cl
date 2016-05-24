{!! dd($empresa) !!}

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
        <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Crear Banner</span>
      </div>


      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="list-group">

              <div class="list-group-item list-group-item-success">
                <h5>Empresas con Banner<span id="resizePendingCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div>

              <script>
                $('#resizePendingCourses').click(function(){
                  if($(this).attr('name') == 'small'){
                    $('#insidePendingCourses').removeClass('wrap');
                    $('#insidePendingCourses').addClass('wrap-long-vertical');
                    $(this).removeClass('glyphicon-resize-full');
                    $(this).addClass('glyphicon-resize-small');
                    $(this).attr('name', 'long');
                    return true;
                  }else{
                    $('#insidePendingCourses').removeClass('wrap-long-vertical');
                    $('#insidePendingCourses').addClass('wrap');
                    $(this).removeClass('glyphicon-resize-small');
                    $(this).addClass('glyphicon-resize-full');
                    $(this).attr('name', 'small');
                    return true;
                  }
                });
              </script>

              <div id="insidePendingCourses" class="list-group-item wrap">
                <table id="CoursesList" class="table table-hover" style="font-size: 0.8em;">
                  <thead>
                  <th>Id Empresa</th>
                  <th>Nombre Empresa</th>
                  <th>Estado</th>
                  <th>Descripci&oacute;n</th>
                  <th>Se cre&oacute;</th>
                  <th>&Uacute;ltima modificaci&oacute;n</th>
                  <th>Imagen</th>
                    <th>Operaciones</th>
                  </thead>
                    <tbody>
                    </tbody>
                </table>
              </div> <!-- /div inside courses -->
            </div> <!-- /list group -->
        </div>
      </div>
    </div>
  </div>


@stop