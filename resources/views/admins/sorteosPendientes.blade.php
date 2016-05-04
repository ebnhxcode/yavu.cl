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
        <img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span>Sorteos Pendientes</span>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">



            <div class="list-group">

              <div class="list-group-item list-group-item-success">
                <h5>Sorteos de empresas que a&uacute;n est&aacute;n pendientes<span id="resizePendingCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
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
                  <th>Id sorteo</th>
                  <th>Nombre sorteo</th>
                  <th>Empresa</th>
                  <th>Estado</th>
                  <th>Descripci&oacute;n</th>
                  <th>Fecha</th>
                  <th>Imagen</th>


                  @if(Auth::admin()->check())
                    <th>Operaciones</th>
                  @endif
                  </thead>
                  <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
                  @foreach($sorteospendientes as $sorteo)
                    <tbody>
                      <td>{!! $sorteo->id !!}</td>
                      <td>{!! $sorteo->nombre_sorteo !!}</td>
                      <td>{!! $sorteo->nombre_empresa !!}</td>
                      <td id="estado{!! $sorteo->id !!}">{!! $sorteo->estado_sorteo!!}</td>
                      <td>{!! $sorteo->descripcion !!}</td>
                      <td>{!! $sorteo->fecha_inicio_sorteo !!}</td>
                      <td><img width="100" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt=""></td>

                      <td>
                        <span class="btn btn-primary btn-sm aprobar" onclick="aprobarSorteo({!! $sorteo->id !!})">Aprobar</span>
                        <!--<a class="btn btn-success btn-sm" href="#!">Ver</a>-->
                      </td>
                    </tbody>
                  @endforeach
                </table>
              </div> <!-- /div inside courses -->

            </div> <!-- /list group -->

        </div>
      </div>

    </div>

  </div>




@stop