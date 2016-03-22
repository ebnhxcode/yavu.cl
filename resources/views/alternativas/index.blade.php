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
          @foreach($alternativas as $alternativa) 
          <tbody>
            <td>{{$alternativa->encuesta_id}}</td>
            <td>{{$alternativa->alternativa}}</td>
            <td>{!!link_to_route('alternativas.edit', $title = 'Editar', $parameters = $alternativa->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$alternativas->render()!!}
  </div>
</div>
@stop

