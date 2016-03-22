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
          @foreach($eventos as $evento) 
          <tbody>
            <td>{{$evento->nombre}}</td>
            <td>{{$evento->descripcion}}</td>            
            <td>{!!link_to_route('eventos.edit', $title = 'Editar', $parameters = $evento->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$eventos->render()!!}
  </div>
</div>
@stop

