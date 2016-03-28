@if(isset($sorteo))
  {!! dd($sorteo) !!}
  {!!Html::script('js/jquery.js')!!}
  @extends('layouts.front')
  @section('content')
    <div class="jumbotron">
      <div id="contentMiddle">
        @include('alerts.alertFields')
        @include('alerts.errorsMessage')
        @include('alerts.successMessage')
        @include('alerts.warningMessage')
        <h2>Sorteo : {!! $sorteo->nombre_sorteo !!}</h2>
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
                {!! $sorteo->descripcion !!}
                {!! $sorteo->fecha_inicio_sorteo !!}
                {!! $sorteo->estado_sorteo !!}
                {!! $sorteo->user_id.'/'.Auth::user()->get()->id !!}
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