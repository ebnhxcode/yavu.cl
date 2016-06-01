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
        <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Sorteos Pendientes</span>
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
                  <th>Fecha del sorteo</th>
                  <th>Se cre&oacute;</th>
                  <th>&Uacute;ltima modificaci&oacute;n</th>
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
                      <td>{!! $sorteo->created_at !!}</td>
                      <td>{!! $sorteo->updated_at !!}</td>
                      @if($sorteo->imagen_sorteo != null)
                      <td><img width="100" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt=""></td>
                      @else
                      <td>Sin imagen</td>
                      @endif

                      <td>
                        <span class="btn btn-success btn-sm" onclick="visualizarEmpresaSorteo({!! $sorteo->empresa_id !!})" data-toggle="modal" data-target=".bs-example-modal-lg">Ver</span>
                        <span class="btn btn-primary btn-sm" onclick="aprobarSorteo({!! $sorteo->id !!})">Aprobar</span>
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





  <!-- Modal -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Empresa : <span id="nombre_empresa"></span></h4>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              N&uacute;mero de empresa : <span id="empresa_id"></span><br>
              Rut : <span id="rut"></span><br>
              Email : <span id="empresa_email"></span><br>
              Descripci&oacute;n : <span id="descripcion_empresa"></span><br>
              Direcci&oacute;n : <span id="direccion_empresa"></span><br>
              Ciudad : <span id="ciudad_empresa"></span><br>
              Regi&oacute;n : <span id="region_empresa"></span><br>
              Pais : <span id="pais_empresa"></span><br>
              Fono 1 : <span id="fono_empresa"></span><br>
              Fono 2 : <span id="fono_2_empresa"></span><br>
              Encargado : <span id="encargado_empresa"></span><br>

            </div>
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>


      </div>
    </div>
  </div>

@stop