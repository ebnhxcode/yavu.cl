@section('favicon') {!!Html::favicon('favicons/events.png')!!} @stop
@section('title') Events @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    @include('alerts.allAlerts')
      <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Operaciones</th>
        </thead>
        @foreach($eventos as $evento)
        <tbody>
          <td>{!!$evento->nombre!!}</td>
          <td>{!!$evento->descripcion!!}</td>
          <td>{!!link_to_route('eventos.edit', $title = 'Editar', $parameters = $evento->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
        </tbody>
        @endforeach
      </table><!-- /table .table -->
      {!!$eventos->render()!!}
  </div><!-- /div #contenMiddle -->
</div><!-- /div .jumbotron -->
@stop

