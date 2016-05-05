@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    <div class="" style="font-size: 3em;">
      <img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span>Sorteos de {!! $empresa[0]->nombre !!}</span>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Atento al usar tus tickets participar
          <span class="glyphicon glyphicon-tag" style="font-size: 1em; color: #BEF781;"></span>
          <span class="glyphicon glyphicon-resize-horizontal"></span>
          <span class="label label-info">#14</span>&nbsp;(<small class="requerido">Tickets de ejemplo</small>)
        </div>
      </div>

      <div class="col-md-4 col-sm-12 col-xs-12">
        <div>
          <div>
            <div class="list-group">

              <div class="list-group-item">
                <div class="row">

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <div align="center">
                        <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
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
                      <div align="center">
                        <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
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
                      <div align="center">
                        <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
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
                      <div align="center">
                        <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
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
                      <div align="center">
                        <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
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
        <div>
          <div>
            @foreach($sorteos as $sorteo)
              <div class="row">

                <div class="col-md-8 col-sm-12 col-xs-12">
                  <div class="thumbnail">
                    @if($sorteo->imagen_sorteo == "")
                      <img class="img-responsive-centered" width="40%" src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
                    @else
                      <img class="img-responsive-centered" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />
                    @endif

                    <div class="amplio">
                      <div style="padding-left: 8px;padding-right: 8px;" class="row">
                        <div align="center" class="col-md-3 col-sm-3 col-xs-3">
                          <span class="glyphicon glyphicon-user"></span>
                          <span class="TicketsEnSorteo" id="{!! $sorteo->id !!}"></span>
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        </div>

                        <div align="center" class="col-md-3 col-sm-3 col-xs-3">
                          <span class="glyphicon glyphicon-tag"></span>
                          <span class="MisTicketsUsados" id="{!! $sorteo->id !!}"></span>
                        </div>

                        <div align="center" class="col-md-6 col-sm-6 col-xs-6">
                          <span class="glyphicon glyphicon-time"></span>
                          <div class="timer" data-seconds-left="{!! $sorteo->created_at !!}" style="float: right;"></div>
                        </div>

                      </div> <!-- /div row -->
                    </div><!-- /div amplio -->

                    <div class="row">
                      <div align="center" class="col-md-3 col-sm-3 col-xs-3">
                        <small>Tickets en juego</small>
                      </div>

                      <div align="center" class="col-md-3 col-sm-3 col-xs-3">
                        <small>Tickets apostados</small>
                      </div>

                      <div align="center" class="col-md-6 col-sm-6 col-xs-6">
                        <small>Tiempo restante</small>
                        <br>
                        <small><span id="estado"></span></small>
                      </div>
                    </div><!-- /div row -->

                    <div class="semi-amplio">
                      <button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button"   style="display: none; width: 100%;" data-dismiss="modal">Participar</button>
                    </div>

                  </div> <!-- /thumbnail -->
                </div> <!-- /col-md-8 col-sm-12 col-xs-12 -->

                <div class="col-md-4 col-sm-12 col-xs-12">

                  <div>
                    <h5>
                      <strong>Nombre Sorteo: </strong>
                      <strong><input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->nombre_sorteo!!}"></strong>
                    </h5>
                    <h5>
                      <strong>Descripción del Sorteo: </strong>
                      <strong><textarea disabled class="form-control">{!!$sorteo->descripcion!!}</textarea></strong>
                    </h5>
                    <h5>
                      <strong>Estado del Sorteo: </strong>
                      <span class="requerido"></span>
                      <strong><input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->estado_sorteo!!}"></strong>
                    </h5>
                    <h5>
                      <strong>Fecha del sorteo: </strong>
                      <strong><input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->fecha_inicio_sorteo!!}"></strong>
                    </h5>
                    @if(Auth::user()->check())
                      <input id="sorteo_id" value="{!! $sorteo->id !!}" type="hidden" />
                      <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
                      <!--
                    <a id='participar' href="{!! URL::to('#!') !!}" class="btn btn-primary participar btn-sm" data-toggle="modal" data-target="#myModal" value="{!! $sorteo->id !!}" role="button">Comprar</a>
                  -->
                      <div class="btn-group" role="group" aria-label="...">
                      </div>

                      <div class="dropup">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Menu
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                          <li>{!!link_to_route('sorteos.show', $title = 'Ver mas detalles', $parameters = $sorteo->id, $attributes = [])!!}</li>
                          @if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Lanzado')
                            <li role="separator" class="divider"></li>
                            <li>{!!link_to_route('sorteos.show', $title = 'Ir a sortear', $parameters = $sorteo->id, $attributes = [])!!}</li>
                          @elseif($sorteo->estado_sorteo == 'Pendiente')
                            <li><a href="{!! URL::to('sorteos/'.$sorteo->id.'/edit') !!}">Editar</a></li>
                          @endif
                        </ul>
                      </div><!-- /dropup button menu -->

                    @else
                      <a href="{!! URL::to('usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Participar!</a>
                    @endif
                  </div>

                </div> <!-- /div col-md-4 col-sm-12 col-xs-12 -->
              </div><!-- /div row -->
              <hr>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





@stop