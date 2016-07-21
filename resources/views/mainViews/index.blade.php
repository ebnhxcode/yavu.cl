@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Home @stop
@extends('layouts.front')
@section('content')
@include('layouts.bannerFront')
@include('mainViews.loginPartial.modalRegister')
<div class="jumbotron section-a">
  <div class="contentMiddle">
    <div class="row">
      <style>
        body {
          padding-top:50px;
          padding-bottom: 20px;
          /*background: url(/img/header.jpg) no-repeat fixed top left;*/
        }
      </style>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

        @if(!Auth::user()->check())
          @include('alerts.allAlerts')
        @else
          <script>window.location.href = "{{ url('/') }}/dashboard"</script>
        @endif

      </div><!-- /div .col-lg3-md3-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>

    </div><!-- /div .row styled with padding-bottom -->

    <!-- Sección de las 3 imagenes -->

  </div><!-- /div #contentMiddle -->

  <div class="contentMiddle">

    <!-- Primera sección -->
    @include('mainViews.indexPartial.firstSection')
    <!-- End Primera sección -->
  </div><!-- /div #fullWidth -->
</div><!-- /div .jumbotron -->
<div class="jumbotron section-c">
  <div class="contentMiddle">
    <!-- Segunda sección -->
    @include('mainViews.indexPartial.secondSection')
    <!-- End Segunda sección -->
  </div>
</div>
<div class="jumbotron section-a">
  <div class="contentMiddle">
    <!-- Tercera sección -->
    @include('mainViews.indexPartial.thirdSection')
    <!-- End Tercera sección -->
  </div>
</div>
@if(!Auth::user()->check())
  @include('mainViews.indexPartial.modalRegister')
@endif


<div id="fb-root"></div><!-- /div #fb-root -->

@stop
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
