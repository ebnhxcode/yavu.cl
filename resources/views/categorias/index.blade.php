@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Categories @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-lg12-md12-sm12-xs12 -->

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				@include('categorias.indexPartial.sectionLeft')
      </div><!-- /div .col-lg3-md3-sm3-xs12 -->

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				@include('categorias.indexPartial.sectionCenter')
      </div><!-- /div .col-lg6-md6-sm6-xs12 -->

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				@include('categorias.indexPartial.sectionRight')
      </div><!-- /div .col-lg3-md3-sm3-xs12 -->

		</div><!-- /div .row -->

	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop