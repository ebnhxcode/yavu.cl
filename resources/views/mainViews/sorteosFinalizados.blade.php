@section('favicon') {!!Html::favicon('favicons/raffle.png')!!} @stop
@section('title') Sorteos @stop
@extends('layouts.front')

@section('content')
  <div class="jumbotron">
    <div class="contentMiddle">
      <div class="row sidebar-outer">
        <div id="raffleAlerts" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @include('alerts.allAlerts')
        </div><!-- /div col-md12-sm12-xs12 -->

        <div id="sectionLeft" class="col-xs-0 col-sm-2 col-md-3 col-lg-3">
        </div><!-- /div .col-md4-sm12-xs12 -->

        <div id="sectionCenter" class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
          @include('mainViews.sorteosFinalizadosPartial.sectionCenter')
        </div><!-- /div .col-lg6-md6-sm6-xs8 -->

        <div id="sectionRight" class="col-xs-0 col-sm-2 col-md-3 col-lg-3" style="float:right;">
        </div><!-- /div .col-lg3-md3-sm3-xs8 -->

      </div><!-- /div .row -->
    </div><!-- /div #contentMiddle -->
  </div><!-- /div .jumbotron -->
@stop