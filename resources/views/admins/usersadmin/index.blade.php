@section('favicon') {!!Html::favicon('favicons/admin.png')!!} @stop
@section('title') Admins @stop
@extends('layouts.frontadm')
@section('content')
  <div class="jumbotron">
    <div class="contentMiddle">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @include('alerts.allAlerts')
        </div><!-- /div .col-xs12-sm12-md12-lg12 -->

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          @include('admins.indexPartial.sectionLeft')
        </div><!-- /div .col-xs12-sm12-md3-lg3 -->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          @include('admins.usersadmin.indexPartial.sectionCenter')
        </div><!-- /div col-md-6-sm-6-xs-12 -->

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          @include('admins.indexPartial.sectionRight')
        </div><!-- /div .col-xs12-sm12-md3-lg3 -->

      </div><!-- /div .row -->
    </div><!-- /div .contentMiddle -->
  </div><!-- /div .jumbotron -->
@stop

