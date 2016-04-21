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
        <h2>Nombre : {!! $sorteo->nombre_sorteo !!}</h2>
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
                  <div class="list-group-item-full-header">
                    INFORMACIÓN DEL SORTEO
                  </div>
                  <div class="list-group-item">

                    <h5><strong>Nombre Sorteo: </strong>{!!$sorteo->nombre_sorteo!!}</h5>
                    <h5><strong>Descripción del Sorteo: </strong>{!!$sorteo->descripcion!!}</h5>
                    <h5><strong>Estado del Sorteo: </strong><span class="requerido">{!!$sorteo->estado_sorteo!!}</span></h5>
                    <h5><strong>Fecha del sorteo: </strong>{!!$sorteo->fecha_inicio_sorteo!!}</h5>
                    @if($sorteo->user_id == Auth::user()->get()->id)
                      {!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}
                      <a id="SortearGanador" data-toggle="modal"  class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Sortear ganador</a>
                      @include('sorteos.forms.modalSortearParticipante')
                    @endif

                  </div>
                </div>
                <div class="list-group">
                  <div class="list-group-item-full-header">
                    LISTA DE SORTEADOS
                  </div>

                    {!! $winners !!}
                    <div class="list-group-item-danger">
                    </div>
                    <div class="list-group-item-danger">
                    </div>
                    <div class="list-group-item-success">
                    </div>

                </div>

                <script language="JavaScript" type="text/javascript">

                  var bPreguntar = true;

                  window.onbeforeunload = preguntarAntesDeSalir;

                  function preguntarAntesDeSalir()
                  {
                    if (bPreguntar)
                      return "¿Seguro que quieres salir?";
                  }
                </script>

              </div>

            </div>
          </div>


    </div>
  @stop
@else
  404
@endif
