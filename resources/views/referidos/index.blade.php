@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Referrals @stop
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
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Operaciones</th>
          </thead>
          @foreach($intereses as $interes)
            <tbody>
              <td>{!!$interes->nombre_interes!!}</td>
              <td>{!!$interes->descripcion_interes!!}</td>
              <td>{!!link_to_route('intereses.edit', $title = 'Editar', $parameters = $interes->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
            </tbody>
          @endforeach
        </table><!-- /table .table -->
        {!!$intereses->render()!!}
      </div><!-- /div col-md12-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop

