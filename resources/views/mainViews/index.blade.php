@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Home @stop
@extends('layouts.front')
@section('content')

<div class="">
  <div id="contentMiddle">

    <div class="row" style="padding-bottom: 300px;">
      <style>
        body {
          background: url(/img/header2.jpg) no-repeat ;
        }
      </style>

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('mainViews.loginPartial.sectionCenter')
      </div><!-- /div .col-lg3-md3-sm12-xs12 -->

      <div class='col-xs-12 col-sm-12 col-md-9 col-lg-9'>

        @include('alerts.allAlerts')

        <div class="thumbnail">
          @include('layouts.bannerFront')
        </div><!-- /div .thumbnail -->

      </div><!-- /div .col-lg9-md9-sm12-xs12 -->
    </div><!-- /div .row styled with padding-bottom -->

    <!-- Sección de las 3 imagenes -->

    <!-- Primera sección -->
      @include('mainViews.indexPartial.firstSection')
    <!-- End Primera sección -->

    <!-- Segunda sección -->
      @include('mainViews.indexPartial.secondSection')
    <!-- End Segunda sección -->

    <!-- Tercera sección -->
      @include('mainViews.indexPartial.thirdSection')
    <!-- End Tercera sección -->

    <!-- Cuarta sección -->
      @include('mainViews.indexPartial.fourthSection')
    <!-- End Cuarta sección -->

    <!-- Fin Sección de las 3 imagenes -->

    <br>


    @if(!Auth::user()->check())
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="middle">
          <a data-toggle="modal" data-target="#gridSystemModal" role="button" href="#!">
            <img src="img/newGraphics/registrate_02a.png" class="img-responsive" />
          </a>
          <br>
          <img src="img/cards/barra_separadora.png" class="img-responsive" />
        </div><!-- /div .col-md12-sm12-xs12 aligned -->
      </div><!-- /div .row -->
      <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <a href="{{URL::to('/')}}"><img src={{asset('img/yavu005.png')}} width="20%"></a>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button><!-- /button .close -->
              <div align="center">
                <h4 class="modal-title" id="gridSystemModalLabel"></h4>
              </div><!-- /div aligned #gridSystemModalLabel -->
            </div><!-- /div .modal-header -->
            <div class="modal-body">
                @include('alerts.alertFields')
                {!!Form::open(['action'=>'UserController@store', 'method'=>'POST', 'id' => 'FormRegistroLanding'])!!}
                @include('usuarios.forms.fieldsLanding')
                {!! csrf_field() !!}
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style' => 'width:100%;'])!!}
                </div>
                {!!Form::close()!!}

                <div class="form-group has-feedback has-feedback-left">
                  <a class="btn btn-primary" href='{!! URL::to("/social/facebook") !!}'>
                    <span>
                      <img src="{!! URL::to('/img/users/facebook.png') !!}" width="7%" alt="">
                      Registrate o Inicia sesi&oacute;n con Facebook
                    </span>
                  </a><!-- /a .btn .btn-primary -->
                </div><!-- /div .form-group .has-feedback .has-feedback-left -->
            </div><!-- /div .modal-body -->
          </div><!-- /div .modal-content -->
        </div><!-- /div .modal-dialog -->
      </div><!-- /div .modal .fade #gridSystemModal -->
    @endif
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
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
