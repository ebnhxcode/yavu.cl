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
          <img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span >Sorteos <span class="requerido">\</span> {!! $sorteo->nombre_sorteo !!}</span>
        </div>
            <div class="row">
              <div class="col-md-8">
                <div class="list-group">
                  <div class="list-group-item-full-header">

                    @if($sorteo->imagen_sorteo === "")
                      <img class="img-responsive-centered" width="40%" src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
                    @else
                      <img class="img-responsive-centered" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />
                    @endif

                  </div>
                </div>
              </div>



              <div class="col-md-4">
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

                      @if($sorteo->user_id == Auth::user()->get()->id && !isset($winners))
                        {!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}
                        <a id="SortearGanador" data-toggle="modal"  class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Sortear ganador</a>
                        @include('sorteos.forms.modalSortearParticipante')
                      @endif
                    </div>


                  </div>
                </div>
                <div class="list-group">
                  <div class="list-group-item list-group-item-success">
                    GANADOR DEL SORTEO
                  </div>

                  @if(isset($winners))
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

                  @endif
                </div>

                @if(Auth::user()->get()->id == $sorteo->user_id)
                  <script language="JavaScript" type="text/javascript">
                    var bPreguntar = true;
                    window.onbeforeunload = preguntarAntesDeSalir;
                    function preguntarAntesDeSalir()                  {
                      if (bPreguntar) return "¿Seguro que quieres salir?";
                    }
                  </script>
                @endif

              </div>

            </div>
          </div>


    </div>
  @stop
@else
  404
@endif
