@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Home @stop
@extends('layouts.front')
@section('content')
@include('layouts.bannerFront')
<div class="jumbotron hidden-xs">
  <div id="contentMiddle">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        @include('alerts.allAlerts')
        <img src="/img/newGraphics/icono_mac01.png" class="img-responsive-centered" />
        <br /><br />
      </div><!-- /div .col-md4-sm12-xs12 -->
      <div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
        <div class="panel-body">
          <h3> ¿Qué es Yavu?</h3>
          <h4>
            Yavü es la plataforma en donde empresas, concursos y premios coexisten para brindar un servicio único a nuestros usuarios. Sigue a comercios de tu interés, conoce promociones y descuentos en tu ciudad, participa en concursos todas las semanas y entérate de los eventos más importantes totalmente gratis en Yavu.cl.
          </h4>
        </div><!-- /div .panel-body -->
      </div><!-- /div .col-md8-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <img src="img/cards/barra_separadora.png" class="img-responsive">
        <br>
      </div><!-- /div .col-md12-sm12-xs12 -->
    </div><!-- /div .row -->
    <div class="row">
      <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4' align='middle'>
        <img src="/img/newGraphics/neo_icono_premios.png" class="img-responsive">
        <div class="panel-body">
          <p class='lead'>Descubre comercios en tu ciudad y participa por premios.</p>
        </div><!-- /div .panel-body -->
      </div><!-- /div .col-md4-sm12-xs12 aligned -->
      <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4' align='middle'>
        <img src="/img/newGraphics/neo_icono_comercio02.png" class="img-responsive">
        <div class="panel-body">
          <p class='lead'>Acumula nuestras Yavü Coins en las publicaciones de las empresas.</p>
        </div><!-- /div .panel-body -->
      </div><!-- /div .col-md4-sm12-xs12 aligned -->
      <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4' align='middle'>
        <img src="/img/newGraphics/neo_icono_conoce_empresa.png" class="img-responsive">
        <div class="panel-body">
          <p class='lead'>Compra Tickets con tus Coins y úsalos en los sorteos.</p>
        </div><!-- /div .panel-body -->
      </div><!-- /div .col-md4-sm12-xs12 aligned -->
    </div><!-- /div .row -->
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
              </button>
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
                  </a>
                </div><!-- /div .form-group .has-feedback .has-feedback-left -->
            </div><!-- /div .modal-body -->
          </div><!-- /div .modal-content -->
        </div><!-- /div .modal-dialog -->
      </div><!-- /div .modal .fade #gridSystemModal -->
    @endif
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
<div class="jumbotron visible-xs" id="firstbg">
  @include('layouts.loginForm')
</div>
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
