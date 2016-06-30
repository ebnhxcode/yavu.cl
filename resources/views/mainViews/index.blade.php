@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Home @stop
@extends('layouts.front')
@section('content')
@include('layouts.bannerFront')
<div class="jumbotron">
  <div id="contentMiddle">
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

  <div id="contentMiddle">

    {{--
    <div align="center" class="row">
      <img src="/img/contacto01.png" width="100%" alt="" style="border-radius: 5px 5px 0px 0px;" />
      <div align="center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-hover-front" style="padding-bottom: 20px; padding-top: 20px; border-radius: 0px 0px 5px 5px;">
        <h1>Y... ¿Qué es <img src="/img/yavu005.png" alt=""/> ?</h1>
      </div><!-- /div .col-lg12-md12-sm12-xs12 -->
    </div><!-- /div .row -->
    --}}

    {{--
    <!-- Primera sección -->
      @include('mainViews.indexPartial.firstSection')
    <!-- End Primera sección -->


    <!-- Segunda sección -->
      @include('mainViews.indexPartial.secondSection')
    <!-- End Segunda sección -->

    <!-- Tercera sección -->
      @include('mainViews.indexPartial.thirdSection')
    <!-- End Tercera sección -->

    --}}

    <!-- Registro entre medio -->
      {{--
      <div align="center" class="row" style="padding-bottom: 80px;">

        <a align="center" data-toggle="modal" data-target="#gridSystemModal" role="button" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-success">
          <h1>¡Registrate!</h1>
        </a><!-- /div .col-lg12-md12-sm12-xs12 -->

      </div><!-- /div .row -->
      --}}

    <!-- End Registro entre medio -->

    <!-- Cuarta sección -->

      @include('mainViews.indexPartial.fourthSection')


    <!-- End Cuarta sección -->

    <!-- Fin Sección de las 3 imagenes -->

  </div><!-- /div #fullWidth -->
</div><!-- /div .jumbotron -->

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
