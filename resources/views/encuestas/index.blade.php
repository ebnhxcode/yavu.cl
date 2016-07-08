@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Surveys @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div class="contentMiddle">
    @include('alerts.allAlerts')
        <table class="table">
          <thead>
            <th>Nombre</th>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($encuestas as $encuesta) 
          <tbody>
            <td>{!!$encuesta->nombre!!}</td>
            <td>{!!$encuesta->titulo!!}</td>
            <td>{!!$encuesta->descripcion!!}</td>
            <td>{!!link_to_route('encuestas.edit', $title = 'Editar', $parameters = $encuesta->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$encuestas->render()!!}
  </div>
</div>
@stop

