@section('favicon') {!!Html::favicon('favicons/reports.png')!!} @stop
@section('title') Company statistics @stop
@extends('layouts.front')
@section('content')
  <div class="jumbotron">
    <div class="contentMiddle">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @include('alerts.allAlerts')
        </div><!-- /div col-md12-sm12-xs12 -->

        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
          <div class="list-group">
            @include('miniDashboard.miniDashboard')
          </div> <!-- /div .list-group -->
        </div><!-- /div col-lg3-md3-sm3-xs12 -->

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
          @include('empresas.companyStatisticsPartial.statisticsTypesPartial.'.$statisticType)
        </div><!-- /div col-lg6-md6-sm6-xs12 -->

        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
          @include('empresas.companyStatisticsPartial.sectionRight')
        </div><!-- /div col-lg3-md3-sm3-xs12 -->

      </div><!-- /div .row -->
    </div><!-- /div .contentMiddle -->
  </div><!-- /div .jumbotron -->
@stop