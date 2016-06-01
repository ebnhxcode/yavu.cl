@section('title') Benefits @stop
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
          @foreach($beneficios as $beneficio) 
          <tbody>
            <td>{!!$beneficio->nombre!!}</td>
            <td>{!!$beneficio->descripcion!!}</td>
            <td>{!!link_to_route('beneficios.edit', $title = 'Editar', $parameters = $beneficio->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$beneficios->render()!!}
  </div>
</div>
@stop

