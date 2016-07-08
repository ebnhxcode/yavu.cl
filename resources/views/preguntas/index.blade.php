@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Questions @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div class="contentMiddle">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table">
          <thead>
            <th>Nombre</th>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($preguntas as $pregunta)
          <tbody>
            <td>{!!$pregunta->encuesta_id!!}</td>
            <td>{!!$pregunta->pregunta!!}</td>
            <td>{!!link_to_route('preguntas.edit', $title = 'Editar', $parameters = $pregunta->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table><!-- /table .table -->
        {!!$preguntas->render()!!}
      </div><!-- /div col-md12-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop

