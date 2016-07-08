@section('favicon') {!!Html::favicon('favicons/ticket.png')!!} @stop
@section('title') Tickets @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
		<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="list-group">
          @include('miniDashboard.miniDashboard')
        </div><!-- /div .list-group -->
			</div><!-- /div .col-md4-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="list-group">
          <div class="list-group-item list-group-item-success">
            COMPRA TUS TICKET'S A <span class="label label-warning">$ 100</span>
          </div><!-- /div .list-group-item .success -->
          <div class="list-group-item">
            {!!Form::select('size', [1=>1,5=>5,10=>10,15=>15], null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control'])!!}
            <br>
            <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-md comprar">Comprar ticket</button>
            <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" /><!-- /input token -->
            <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" /><!-- /input user_id -->
          </div><!-- /div .list-group-item -->
        </div><!-- /div .list-group -->
			</div><!-- /div .col-md8-sm12-xs12 -->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
