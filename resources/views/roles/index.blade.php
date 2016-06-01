@section('title') Roles @stop
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
          @foreach($roles as $role) 
          <tbody>
            <td>{!!$role->nombre!!}</td>
            <td>{!!$role->descripcion!!}</td>
            <td>{!!link_to_route('roles.edit', $title = 'Editar', $parameters = $role->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$roles->render()!!}
  </div>
</div>
@stop

