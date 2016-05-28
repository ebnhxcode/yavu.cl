@extends('layouts.frontadm')
@section('content')
  <div class="jumbotron">
    <div id="contentMiddle">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          @include('alerts.alertFields')
          @include('alerts.errorsMessage')
          @include('alerts.successMessage')
          @include('alerts.warningMessage')
          @include('alerts.infoMessage')
          <div class="" style="font-size: 3em;">
            <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Lista de empresas</span>
          </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          {{-- ESTÁ PENDIENTE EL BUSCADOR DE LA EMPRESA EN ADMIN --}}
          {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'empresa', 'aria-describedby' => 'sizing-addon1'])!!}
          <br>
          <div id="EmpresaListThumb">
            <div class="row">
              @foreach($empresas[0] as $empresa)

                <div class="col-md-3 col-sm-4 col-xs-12">
                  <div class="thumbnail card">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <address>
                          <strong>Titulo:</strong> {!!$empresa[0]->titulo_banner!!}<br>
                           <strong>estado_banner:</strong> {!!$empresa->estado_banner!!}<br>
                        </address>
                      </div>
                    </div><!-- /div row -->
                  </div>
                </div>

    0 => "titulo_banner"
    1 => "descripcion_banner"
    2 => "estado_banner"
    3 => "banner"

    "id" => 22
    "titulo_banner" => "asdasdasd"
    "banner" => "196.jpg"
    "descripcion_banner" => "asdasd"
    "estado_banner" => "Creado"
    "empresa_id" => "1"
    "created_at" => "2016-05-27 15:09:01"
    "updated_at" => "2016-05-27 15:16:19"



              @endforeach
            </div>
          </div> <!-- /Empresa list thumb -->
          {!!$empresas->render()!!}
        </div>
      </div><!-- /div row -->
    </div><!-- /div contentMiddle -->
  </div><!-- /div jumbotron -->
@stop

