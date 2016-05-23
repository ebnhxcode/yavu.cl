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
                <h5>Sorteos de empresas que a&uacute;n est&aacute;n pendientes<span id="resizePendingCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div>




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