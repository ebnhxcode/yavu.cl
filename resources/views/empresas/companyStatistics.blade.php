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

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <div class="list-group">
            @include('miniDashboard.miniDashboard')
          </div> <!-- /div .list-group -->
        </div><!-- /div col-lg3-md3-sm3-xs12 -->

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          @include('empresas.companyStatisticsPartial.sectionCenter')
        </div><!-- /div col-lg6-md6-sm6-xs12 -->

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          @include('empresas.companyStatisticsPartial.sectionRight')
        </div><!-- /div col-lg3-md3-sm3-xs12 -->

      </div><!-- /div .row -->
    </div><!-- /div .contentMiddle -->
  </div><!-- /div .jumbotron -->
@stop