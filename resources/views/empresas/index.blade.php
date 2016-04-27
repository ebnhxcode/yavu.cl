{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarEmpresa.js')!!}
@extends('layouts.front')	
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		@include('alerts.infoMessage')
    <div class="" style="font-size: 3em;">
      <img id="img" width="8%" src= "{!!URL::to('img/dash/ico_empresa.png')!!}"/><span>Empresas</span>
    </div>

    <div class="row">
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="list-group">
              <div class="list-group-item list-group-item-success">
                FILTRO DE BÚSQUEDA
              </div>
              <div class="list-group-item">
                @if(Auth::admin()->check())
                    {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'empresa', 'aria-describedby' => 'sizing-addon1'])!!}
                @elseif(Auth::user()->check() || !Auth::user()->check())
                    {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'empresathumb', 'role' => 'combobox', 'aria-describedby' => 'sizing-addon1'])!!}
                @endif
              </div>
              <div class="list-group-item">
                <div class="row">

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <div>
                        <a href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
                          </span>
                        </a>
                      </div>
                      <div align="center"><small>Crear sorteo</small></div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <div>
                        <a href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}"/>
                          </span>
                        </a>
                      </div>
                      <div align="center"><small>Tickets</small></div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <div>
                        <a href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
                          </span>
                        </a>
                      </div>
                      <div align="center"><small>Publicaciones</small></div>
                    </div>
                  </div>

                  <div class='col-md-4 col-sm-4 col-xs-4'>
                    <div class='list-group' >
                      <div>
                        <a href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
                          </span>
                        </a>
                      </div>
                      <div align="center"><small>Informe Coins</small></div>
                    </div>
                  </div>

                  <div class='col-md-4 col-sm-4 col-xs-4'>
                    <div class='list-group' >
                      <div>
                        <a href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
                          </span>
                        </a>
                      </div>
                      <div align="center"><small>Informe Ticket's</small></div>
                    </div>
                  </div>

                </div><!-- /row -->
              </div> <!-- /list group item -->


            </div> <!-- /list group -->

          </div>
        </div> <!-- /panel -->
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">

            <div class="form-group">

            </div>
            @if(Auth::admin()->check())
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
            @elseif(Auth::user()->check() || !Auth::user()->check())
              <div id="EmpresaListThumb">
                @foreach($empresas as $empresa)
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="thumbnail card">

                      @if($empresa->imagen_portada === "" )
                        <img id="ImagenPortada" src="/img/users/banner.png" alt="...">
                      @else
                        <img id="ImagenPortada" src="/img/users/{!!$empresa->imagen_portada!!}" alt="...">
                      @endif

                      {{-- @if($empresa->imagen_perfil !== "")
                        <img width="40%" class="img-circle" src="{!!URL::to('img/users/'.$empresa->imagen_perfil)!!}" alt="">
                      @else
                        <img width="40%" id="ImagenPerfil" class="img-circle" src="/images/pyme.jpg" alt="...">
                      @endif --}}

                      <h4><a class="btn-link" href="/empresa/{!!$empresa->nombre!!}">{!!$empresa->nombre!!}</a></h4>
                      {!!$empresa->ciudad!!}
                      <br>
                      {!!$empresa->fono!!}
                      <br>
                    </div>
                  </div>
                @endforeach
              </div> <!-- /Empresa list thumb -->
              {!!$empresas->render()!!}
            @endif

          </div><!-- /panel body -->
        </div><!-- /panel panel-default -->
      </div>
    </div>




	</div><!-- /contentMiddle -->
</div><!-- /jumbotron -->


@stop