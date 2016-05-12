@extends('layouts.front')
@section('content')
@include('layouts.bannerFront')
<div class="jumbotron">
  <div id="contentMiddle">
    <div class="row">
      <div class="col-md-4 col-sm-12 col-xs-12">
        @include('alerts.errorsMessage')
        @include('alerts.warningMessage')
        @include('alerts.successMessage')
        @include('alerts.infoMessage')
        <img src="/img/newGraphics/icono_mac01.png" class="img-responsive-centered" />
        <br /><br />
      </div>

      <div class='col-md-8 col-sm-12 col-xs-12'>
        <div>
          <div class="panel-body">
            <h3> ¿Qué es Yavu?</h3>
            <h4>
              Yavü es la plataforma en donde empresas, concursos y premios coexisten para brindar un servicio único a nuestros usuarios. Sigue a comercios de tu interés, conoce promociones y descuentos en tu ciudad, participa en concursos todas las semanas y entérate de los eventos más importantes totalmente gratis en Yavu.cl.
            </h4>
          </div><!-- /div panel body -->
        </div><!-- /div panel -->
      </div><!-- /div col-md-7 col-sm-12 col-xs-12 -->

      <!-- DEJAR EN EL FOOTER
      <div class="col-md-4">
        <div class="fb-page" data-href="https://www.facebook.com/Yavucl-1508348302804625/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="500" data-height="500" data-hide-cover="false" data-show-facepile="true"></div>
      </div>
      -->
      <div class="col-md-12 col-sm-12 col-xs-12">
        <img src="img/cards/barra_separadora.png" class="img-responsive">
        <br>
      </div>

    </div><!-- /div row -->

    <div class="row">

      <div class='col-md-4 col-sm-12 col-xs-12' align='middle'>
        <div>
          <img src="/img/newGraphics/neo_icono_premios.png" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Hay cientos de comercios esperando por ti!</p>
          </div>
        </div>
      </div>

      <div class='col-md-4 col-sm-12 col-xs-12' align='middle'>
        <div>
          <img src="/img/newGraphics/neo_icono_comercio02.png" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Conoce que comentan los comercios en tiempo real.</p>
          </div>
        </div>
      </div>

      <div class='col-md-4 col-sm-12 col-xs-12' align='middle'>
        <div>
          <img src="/img/newGraphics/neo_icono_conoce_empresa.png" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Acumula Yavu Coins y accede a beneficios.</p>
          </div>
        </div>
      </div>

    </div><!-- /div row -->
    <br>
    @if(!Auth::user()->check())
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" align="middle">
        <a href="{{URL::to('/login')}}"><img src="{!! asset('img/newGraphics/registrate_02a.png') !!}" class="img-responsive"></a>
          <br>
          <img src="img/cards/barra_separadora.png" class="img-responsive" />
        </div>
      </div><!-- /div row -->



    @endif
    </div><!-- /div contentMiddle -->
  </div>
<div id="fb-root"></div>
@stop


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
