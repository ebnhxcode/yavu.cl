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
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-8">
                @if($sorteo->imagen_sorteo === "")
                  <img class="img-responsive-centered" width="40%" src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
                @else
                  <img class="img-responsive-centered" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />
                @endif
              </div>
              <div class="col-md-4">
                {!! $sorteo->nombre_sorteo !!}<br>
                {!! $sorteo->descripcion !!}<br>
                {!! $sorteo->fecha_inicio_sorteo !!}<br>
                {!! $sorteo->estado_sorteo !!}<br>
                @if($sorteo->user_id === Auth::user()->get()->id)
                  {!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}
                  <a id="SortearGanador" data-toggle="modal"  class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Sortear ganador</a>
                  @include('sorteos.forms.modalSortearParticipante')
                @else

                  <a id="SortearGanador" data-toggle="modal" data-target="#ModalGanadorSorteo" class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Ver al ganador</a>

                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @stop
@else
  404
@endif
