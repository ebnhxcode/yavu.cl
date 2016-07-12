@section('favicon') {!!Html::favicon('favicons/company.png')!!} @stop
@section('title') Empresas @stop
@extends('layouts.front')
@section('content')
{{--{!!Html::script('js/ajax/BuscarEmpresa.js')!!}--}}

<div class="jumbotron">
	<div class="contentMiddle">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-lg12-md12-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('empresas.indexPartial.sectionLeft')
      </div><!-- /div col-lg3-md3-sm12-xs12 -->

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @include('empresas.indexPartial.sectionCenter')
      </div><!-- /div col-lg6-md6-sm12-xs12 -->

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('empresas.indexPartial.sectionRight')
      </div></div><!-- /div col-lg3-md3-sm12-xs12 -->

      @if(!isset($paginator))
        <div class="text-center">{!!$empresas->render()!!}</div>
      @endif
    </div><!-- /div .row -->

	</div><!-- /contentMiddle -->
</div><!-- /jumbotron -->


@stop