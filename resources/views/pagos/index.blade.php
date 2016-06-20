@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Pays @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table">
          <thead>
            <th>Id Usuario</th>
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($pagos as $pago) 
          <tbody>
            <td>{!!$pago->user_id!!}</td>
            <td>{!!$pago->descripcion!!}</td>
            <td>{!!link_to_route('pagos.edit', $title = 'Editar', $parameters = $pago->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
          </tbody>
          @endforeach
        </table><!-- /table .table -->
        {!!$pagos->render()!!}
      </div><!-- /div col-md12-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop