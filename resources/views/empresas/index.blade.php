@section('favicon') {!!Html::favicon('favicons/company.png')!!} @stop
@section('title') Companies @stop
@extends('layouts.front')
@section('content')
{!!Html::script('js/ajax/BuscarEmpresa.js')!!}
<div class="jumbotron">
	<div id="contentMiddle">
    @include('alerts.allAlerts')
    <!--
    <div class="" style="font-size: 3em;">
      <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_empresa.png')!!}"/><span>Empresas</span>
    </div>
    -->
    <div class="row">
      <div class="col-md-4 col-sm-12 col-xs-12">

        <div>
          <div>
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
             
              @include('miniDashboard.miniDashboard')
      
              @include('listarBanner.listaBanner')

            </div> <!-- /list group -->

          </div>
        </div> <!-- /panel -->
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div>
          <div>
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
                        <img id="ImagenPortada" src="/img/users/banner.png" alt="..." style="height: 200px;">
                      @else
                        <img id="ImagenPortada" src="/img/users/{!!$empresa->imagen_portada!!}" alt="..." style="height: 200px;">
                      @endif

                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <address>
                              <h4><a class="btn-link" href="/empresa/{!!$empresa->nombre!!}">{!! $empresa->nombre!!}</a></h4>
                              <strong>Ciudad :</strong> {!!$empresa->ciudad!!}<br>
                              <strong>Contacto :<strong><a href="mailto:#">{!!$empresa->email!!}</a></strong><br>
                              <strong>Fono :</strong> <abbr title="Phone"></abbr> {!!$empresa->fono!!}<br>

                            </address>

                            <div align="center">

                              <div class="btn-group" role="group" aria-label="...">
                                <a href="{!! URL::to('/empresa/'.$empresa->nombre.'/') !!}" class="btn btn-default btn-xs">Ver perfil</a>
                                <a href="{!! URL::to('/empresa/'.$empresa->nombre.'/sorteos') !!}" class="btn btn-default btn-xs">Ver sorteos</a>
                              </div>

                              @if(Auth::user()->get()->id == $empresa->user_id)
                                <ul class="dropdown-menu">
                                  <li><a href="{!! URL::to('/empresas/'.$empresa->id.'/edit') !!}">Editar empresa</a></li>
                                  <li><a href="{!! URL::to('/sorteos/create') !!}">Crear sorteo</a></li>
                                </ul>
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Mi empresa
                                  <span class="glyphicon glyphicon-cog"></span>
                                  <span class="caret"></span>
                                </button>
                              @endif
                            </div>


                          </div>
                        </div><!-- /div row -->
                    </div><!-- /div thumbnail card -->
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