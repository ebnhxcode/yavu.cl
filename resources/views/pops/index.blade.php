@section('favicon') {!!Html::favicon('favicons/pop.gif')!!} @stop
@section('title') Pops @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/notificaciones/GestionarNotificaciones.js')!!}
{{--{!!Html::script('js/ajax/InteraccionPublicaciones.js')!!}--}}
@extends('layouts.front') 
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    <div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-md12-sm12-xs12 -->

			<div class="col-md-4 col-sm-12 col-xs-12">
				@include('pops.forms.panelLeft')
			</div><!-- /div .col-md4-sm12-xs12 -->

			<div class="col-md-5 col-sm-12 col-xs-12">
				@include('pops.forms.panelCenter')
			</div><!-- /div .col-md5-sm12-xs12 -->

			<div class="col-md-3 col-sm-12 col-xs-12">
				@include('pops.forms.panelRight')
			</div><!-- /div .col-md3-sm12-xs12 -->

		</div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
