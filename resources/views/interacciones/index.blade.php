@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Interactions @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table">
          <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($interacciones as $interaccion) 
          <tbody>
            <td>{!!$interaccion->nombre_interaccion!!}</td>
            <td>{!!$interaccion->descripcion_interaccion!!}</td>
            <td>{!!link_to_route('interacciones.edit', $title = 'Editar', $parameters = $interaccion->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table><!-- /table .table -->
        {!!$interacciones->render()!!}
      </div><!-- /div col-md12-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop

