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
            <th>Id Usuario</th>
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($pagos as $pago) 
          <tbody>
            <td>{{$pago->user_id}}</td>
            <td>{{$pago->descripcion}}</td>            
            <td>{!!link_to_route('pagos.edit', $title = 'Editar', $parameters = $pago->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table>  
      {!!$pagos->render()!!}
  </div>
</div>
@stop

