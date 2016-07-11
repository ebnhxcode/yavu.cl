@section('favicon') {!!Html::favicon('favicons/pop.gif')!!} @stop
@section('title') Pops @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/notificaciones/GestionarNotificaciones.js')!!}
{{--{!!Html::script('js/ajax/InteraccionPublicaciones.js')!!}--}}
@extends('layouts.front') 
@section('content')
<div class="jumbotron">
  <div class="contentMiddle">
    <div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-md12-sm12-xs12 -->

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				@include('pops.indexPartial.panelLeft')
			</div><!-- /div .col-md3-sm12-xs12 -->

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				@include('pops.indexPartial.panelCenter')
			</div><!-- /div .col-md6-sm12-xs12 -->

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				@include('empresas.indexPartial.sectionRight')
			</div><!-- /div .col-md3-sm12-xs12 -->

		</div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
