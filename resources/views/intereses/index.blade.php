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
          @foreach($intereses as $interes) 
          <tbody>
            <td>{{$interes->nombre_interes}}</td>
            <td>{{$interes->descripcion_interes}}</td>            
            <td>{!!link_to_route('intereses.edit', $title = 'Editar', $parameters = $interes->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$intereses->render()!!}
  </div>
</div>
@stop

