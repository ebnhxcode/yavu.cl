{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@if(isset($sorteo))
  @extends('layouts.front')
  @section('content')
    <div class="jumbotron">
      <div id="contentMiddle">
        @include('alerts.alertFields')
        @include('alerts.errorsMessage')
        @include('alerts.successMessage')
        @include('alerts.warningMessage')
        <div class="" style="font-size: 3em;">
          <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_sorteo.png')!!}"/><span ><a href="{!! URL::to('sorteos') !!}" class="btn-link">Sorteos</a>  <span class="requerido">\</span> {!! $sorteo->nombre_sorteo !!}</span>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="list-group">
              @if(isset($winners))
              <div class="list-group-item list-group-item-success">
                GANADOR DEL SORTEO
              </div>
                <div class="list-group-item list-group-item-success">
                  <div class="well well-xs">
                    <span class="label label-success">1</span>
                    ¡Ganador! : {!! $winners[0]->nombre.' '.$winners[0]->apellido !!}
                  </div>
                </div>
                {{--
                <div class="list-group-item list-group-item-danger">
                  <div class="well well-xs">
                    <span class="label label-danger">2</span>
                    ¡Segundo lugar! : {!! $winners[1]->nombre.' '.$winners[1]->apellido !!}
                  </div>
                </div>
                <div class="list-group-item list-group-item-danger">
                  <div class="well well-xs">
                    <span class="label label-danger">3</span>
                    ¡Tercer lugar! : {!! $winners[2]->nombre.' '.$winners[2]->apellido !!}
                  </div>
                </div>
                 --}}
              @else
              <div class="list-group-item list-group-item-success">
                SORTEO PENDIENTE :( 
              </div>
                <div class="list-group-item list-group-item-success">
                  <div class="well well-xs">
                    ¡Habrá <span class="label label-success">1</span>
                     Ganador! : <span class="text-danger">¡Espera hasta las 21 hrs el d&iacute;a {!!$sorteo->fecha_inicio_sorteo!!}!</span><img width="80" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt="">
                  </div>
                </div>
              @endif
            </div><!-- /div list-group -->

            <div class="list-group">

              <div id="msjs{!! $sorteo->id !!}" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="list-group-item">
                <div class="amplio">
                  <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button"   style="display: none; width: 100%;" data-dismiss="modal">Participar</button>
                </div>

                @if($sorteo->imagen_sorteo === "")
                  <img class="img-responsive-centered" width="40%" src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
                @else
                  <img class="img-responsive-centered" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />
                @endif

              </div><!-- /div list-group-item-full-header -->
            </div><!-- /div list-group -->
          </div><!-- /div col-md-8 col-sm-12 col-xs-12 -->
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="list-group">
              <div class="list-group-item list-group-item-success">
                INFORMACIÓN DEL SORTEO
              </div>
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
                    {!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}
                    <a id="SortearGanador" data-toggle="modal"  class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Sortear ganador</a>
                    @include('sorteos.forms.modalSortearParticipante')
                  @endif
                </div><!-- /div well -->
              </div><!-- /div list-group-item -->
            </div><!-- /div list-group-item -->

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
          </div><!-- /div col-md-4 -->
        </div><!-- /div row -->
      </div><!-- /div contentMiddle -->
    </div><!-- /div jumbotron -->
  @stop
@else
  404
@endif
