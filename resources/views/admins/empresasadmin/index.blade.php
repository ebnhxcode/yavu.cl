
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

        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="list-group">

            <div class="list-group">
              <div class="list-group-item">
                {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'empresa', 'aria-describedby' => 'sizing-addon1'])!!}
              </div>
            </div>

            <div class="list-group-item">
              <h3>Lista de empresas</h3>
            </div>
            <div class="list-group-item">
              <div class="wrap">


                <table class="table table-hover" id="EmpresaList">
                  <thead>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>ciudad</th>
                  <th>Fono</th>
                  <th>Aniversario Empresa</th>
                  <th>Encargado</th>
                  <th>Operaciones</th>
                  </thead>
                  @foreach($empresas as $empresa)
                    <tbody>
                    <td>{!!$empresa->nombre!!}</td>
                    <td>{!!$empresa->email!!}</td>
                    <td>{!!$empresa->ciudad!!}</td>
                    <td>{!!$empresa->fono!!}</td>
                    <td>{!!$empresa->fecha_creacion!!}</td>
                    <td>{!!$empresa->nombre_encargado!!}</td>
                    <td>{!!link_to_route('empresas.edit', $title = 'Editar', $parameters = $empresa->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
                    </tbody>
                  @endforeach
                </table>


                {!!$admins->render()!!}

              </div>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">

        </div><!-- /div col-md-6-sm-6-xs-12 -->
      </div><!-- /div row -->
    </div><!-- /div contentMiddle -->
  </div><!-- /div jumbotron -->


@stop

