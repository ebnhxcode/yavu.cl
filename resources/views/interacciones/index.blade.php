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
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($interacciones as $interaccion) 
          <tbody>
            <td>{{$interaccion->nombre_interaccion}}</td>
            <td>{{$interaccion->descripcion_interaccion}}</td>            
            <td>{!!link_to_route('interacciones.edit', $title = 'Editar', $parameters = $interaccion->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$interacciones->render()!!}
  </div>
</div>
@stop

