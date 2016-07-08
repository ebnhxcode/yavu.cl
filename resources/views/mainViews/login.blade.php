@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Login @stop
@extends('layouts.front')
@section('content')
  <style type="text/css">
    body {
      /*background: url(/img/users/iniciar_sesion.jpg) no-repeat fixed top center;*/
      /*background-size: 130% 100%;*/
      background-color: #fafafa;
      padding-top:50px;
      padding-bottom: 20px;
    }
  </style>
  <div>

    <div class="contentMiddle">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </div><!-- /div .col-lg12-md12-sm12-xs12 -->

        <div class="col-xs-2 col-sm-3 col-md-4 col-lg-4">
          @include('mainViews.loginPartial.sectionLeft')
        </div><!-- /div .col-lg4-md4-sm4-xs12 -->

        <div class="col-xs-8 col-sm-6 col-md-4 col-lg-4">
          @include('alerts.allAlerts')
          @include('mainViews.loginPartial.sectionCenter')
          @include('mainViews.indexPartial.modalRegister')
        </div><!-- /div .col-lg4-md4-sm4-xs12 -->

        <div class="col-xs-2 col-sm-3 col-md-4 col-lg-4">
          @include('mainViews.loginPartial.sectionRight')
        </div><!-- /div .col-lg4-md4-sm4-xs12 -->

      </div><!-- /div .row -->
    </div><!-- /div #contentMini -->

  </div><!-- /div ex -> .jumbotron -->


@stop

