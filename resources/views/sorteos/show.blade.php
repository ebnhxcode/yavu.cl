@section('favicon') {!!Html::favicon('favicons/raffle.png')!!} @stop
@if(isset($sorteo))
  {!!Html::script('js/jquery.js')!!}
  {!!Html::script('js/ajax/ParticiparSorteo.js')!!}
  @section('title') {!! $sorteo->nombre_sorteo !!} @stop
  @extends('layouts.front')
  @section('content')
    <div class="jumbotron">
      <div id="contentMiddle">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- /div .col-md12-sm12-xs12 -->
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="list-group">
              @if(isset($winners))
                <div class="list-group-item list-group-item-success">
                  GANADOR DEL SORTEO
                </div><!-- /div .list-group-item .success -->
                <div class="list-group-item list-group-item-success">
                  <div class="well well-xs">
                    <span class="label label-success">1</span>
                    ¡Ganador! : {!! $winners[0]->nombre.' '.$winners[0]->apellido !!}
                  </div><!-- /div .well .well-xs -->
                </div><!-- /div .list-group-item .success -->
              @else
                <div class="list-group-item list-group-item-success">
                  SORTEO PENDIENTE
                </div><!-- /div .list-group-item .success -->
                <div class="list-group-item list-group-item-success">
                  <div class="well well-xs">
                    ¡Habrá <span class="label label-success">1</span>
                     Ganador! : <span class="text-danger">¡Espera hasta las 21 hrs el d&iacute;a {!!$sorteo->fecha_inicio_sorteo!!}!</span><img width="80" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt="">
                  </div><!-- /div .well .well-xs -->
                </div><!-- /div .list-group-item .success -->
              @endif
            </div><!-- /div .list-group -->

            <div id="msjs{!! $sorteo->id !!}" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div><!-- /div #msjs+sorteo_id  .alert .alert-info .alert-dismissible -->
            <div class="list-group">
              <div class="list-group-item">
                <div class="amplio">
                  <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button"   style="display: none; width: 100%;" data-dismiss="modal">Participar</button>
                </div><!-- /div .amplio -->
                <div class="thumbnail">
                  <img src='{!! isset($sorteo)?($sorteo->imagen_sorteo!='')?'/img/users/'.$sorteo->imagen_sorteo:'https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg':'' !!}' width=100%>
                </div><!-- /div .thumbnail -->
              </div><!-- /div .list-group-item-full-header -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md8-sm12-xs12 -->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="list-group">
              <div class="list-group-item list-group-item-success">
                INFORMACIÓN DEL SORTEO
              </div><!-- /div .list-group-item .success -->
              <div class="list-group-item">
                <div class="well">
                  <h5>
                    <strong>Nombre Sorteo: </strong>
                    <input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->nombre_sorteo!!}">
                  </h5>
                  <h5>
                    <strong>Descripción del Sorteo: </strong>
                    <textarea disabled class="form-control">{!!$sorteo->descripcion!!}</textarea>
                  </h5>
                  <h5>
                    <strong>Estado del Sorteo: </strong>
                    <span class="requerido"></span>
                    <input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->estado_sorteo!!}">
                  </h5>
                  <h5>
                    <strong>Fecha del sorteo: </strong>
                    <input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->fecha_inicio_sorteo!!}">
                  </h5>
                  <h5>
                    <strong>Hora del sorteo: </strong>
                    <input class="form-control" type="text" disabled="disabled" value="21:00:00">
                  </h5>
                  @if($sorteo->user_id == Auth::user()->get()->id && !isset($winners))

                    <a id="SortearGanador" data-toggle="modal"  class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Sortear ganador</a>
                    @include('sorteos.forms.modalSortearParticipante')
                    @if($sorteo->estado_sorteo == 'Pendiente')
                      {!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}
                    @endif
                  @endif
                </div><!-- /div .well -->
              </div><!-- /div .list-group-item -->
            </div><!-- /div .list-group -->
            {{--
            @if(Auth::user()->get()->id == $sorteo->user_id)
              <script language="JavaScript" type="text/javascript">
                var bPreguntar = true;
                window.onbeforeunload = preguntarAntesDeSalir;
                function preguntarAntesDeSalir()                  {
                  if (bPreguntar) return "¿Seguro que quieres salir?";
                }
              </script>
            @endif
            --}}
          </div><!-- /div .col-md4-sm12-xs12 -->
        </div><!-- /div .row -->
      </div><!-- /div #contentMiddle -->
    </div><!-- /div .jumbotron -->
  @stop
@else
  404
@endif
