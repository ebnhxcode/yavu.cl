@extends('layouts.front') 
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    @include('alerts.alertFields')
    @include('alerts.errorsMessage')
    @include('alerts.successMessage')
    @include('alerts.warningMessage') 
        <table class="table">
          <thead>
            <th>Nombre</th>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($preguntas as $pregunta) 
          <tbody>
            <td>{{$pregunta->encuesta_id}}</td>
            <td>{{$pregunta->pregunta}}</td>
            <td>{!!link_to_route('preguntas.edit', $title = 'Editar', $parameters = $pregunta->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$preguntas->render()!!}
  </div>
</div>
@stop

