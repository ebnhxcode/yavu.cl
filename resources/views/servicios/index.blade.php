@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Services @stop
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
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($servicios as $servicio)
            <tbody>
              <td>{!!$servicio->nombre!!}</td>
              <td>{!!$servicio->descripcion!!}</td>
              <td>{!!link_to_route('servicios.edit', $title = 'Editar', $parameters = $servicio->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
            </tbody>
          @endforeach
        </table><!-- /table .table -->
        {!!$servicios->render()!!}
      </div><!-- /div col-md12-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop

