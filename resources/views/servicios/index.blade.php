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
          @foreach($servicios as $servicio) 
          <tbody>
            <td>{{$servicio->nombre}}</td>
            <td>{{$servicio->descripcion}}</td>            
            <td>{!!link_to_route('servicios.edit', $title = 'Editar', $parameters = $servicio->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$servicios->render()!!}
  </div>
</div>
@stop

