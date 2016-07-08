@section('favicon') {!!Html::favicon('favicons/company.png')!!} @stop
@section('title') Companies @stop
@extends('layouts.frontadm')
@section('content')
  <div class="jumbotron">
    <div class="contentMiddle">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @include('alerts.allAlerts')
          <!--
          <div class="" style="font-size: 3em;">
            <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Lista de empresas</span>
          </div>
          -->
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{-- ESTÁ PENDIENTE EL BUSCADOR DE LA EMPRESA EN ADMIN --}}
          {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'empresa', 'aria-describedby' => 'sizing-addon1'])!!}
          <br>
         
          <div id="EmpresaListThumb">
            <div class="row">
              @foreach($empresas as $empresa)
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <div class="thumbnail card">
                    <img id="ImagenPortada" src="{!! ($empresa->imagen_portada!="")?'/img/users/'.$empresa->imagen_portada:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <address>
                          <h4><a class="btn-link" href="/empresa/{!!$empresa->nombre!!}">{!! $empresa->nombre!!}</a></h4>
                          <strong>Ciudad :</strong> {!!$empresa->ciudad!!}<br>
                          <strong>Contacto :<strong><a href="mailto:#">{!!$empresa->email!!}</a></strong><br>
                            <strong>Fono :</strong> <abbr title="Phone"></abbr> {!!$empresa->fono!!}<br></strong>
                          <a href="{!! URL::to('/admins/empresas/'.$empresa->id.'/edit') !!}">editar</a>
                          /
                          <a href="{!! URL::to('/admins/bannercreate/'.$empresa->id) !!}">crear banner</a>
                        </address>
                      </div>
                    </div><!-- /div row -->
                  </div>
                </div>
              @endforeach
            </div>
          </div> <!-- /Empresa list thumb -->
          {!!$empresas->render()!!}
        </div>
      </div><!-- /div row -->
    </div><!-- /div contentMiddle -->
  </div><!-- /div jumbotron -->
@stop

