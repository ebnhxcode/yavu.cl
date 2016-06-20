@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Us @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div align="center" id="contentMiddle">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-md12-sm12-xs12 -->
			<h2>Nuestra Empresa</h2>
			<div class="panel panel-default">
				<div class="panel-body">
					Somos una agencia de publicidad enfocada al publico de internet, siendo un canal de comunicación entre sus productos y nuestra comunidad que crece día a día. Hacia nuestros ususarios nos perfilamos como un sitio de beneficios, en el cual trabajamos diariamente para ofrecer la mayor variedad en descuentos y premios.
				</div><!-- /div .panel-body -->
			</div><!-- /div .panel .panel-default -->
			<h2>Misión</h2>
			<div class="panel panel-default">
				<div class="panel-body">
					Entregar un servicio de publicidad a través de internet, utilizando herramientas informáticas de última generación para aumentar la competitividad de nuestros comercios asociados. Al mismo tiempo, ofrecer a 		nuestros usuarios un sistema de beneficios claro y sencillo que les permita ahorrar diariamente.
				</div><!-- /div .panel-body -->
			</div><!-- /div .panel .panel-default -->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle aligned -->
</div><!-- /div .jumbotron -->
@stop

