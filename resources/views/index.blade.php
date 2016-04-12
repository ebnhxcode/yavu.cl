@extends('layouts.front')
@section('content')
@include('layouts.bannerFront')
<div class="jumbotron">
  <div id="contentMiddle" class="container">
    @include('alerts.errorsMessage')
    @include('alerts.warningMessage')
    @include('alerts.successMessage')
    <div class="row">
      <div class="col-md-5">
        <img src="/img/icono_que_es.png" class="img-responsive-centered">
        <br /><br />
      </div>
      <div class='col-md-7' align='middle'>
        <div class="panel panel-default">
          <div class="panel-body">
            <hr>
            <h3> ¿Qué es Yavu?</h3>
            <h4>
             Yavu.cl es el portal donde los comercios y los premios coexisten para entregar una amplia gama de beneficios tanto para usuarios como para Empresas. Regístrate hoy en nuestro sitio y podrás conocer empresas en tu ciudad y ver qué hablan en tiempo real, además conocer sus promociones y participar por premios, todo gracias a nuestro sistema de bonificación para nuestros usuarios por medio de las Yavu Coins.
            </h4>
            <hr>
          </div>
        </div>
      </div>

      <!-- DEJAR EN EL FOOTER !!!!!!!!
      <div class="col-md-4">
        <div class="fb-page" data-href="https://www.facebook.com/Yavucl-1508348302804625/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="500" data-height="500" data-hide-cover="false" data-show-facepile="true"></div>        
      </div>
      -->
    </div>
	  <img src="img/cards/barra_separadora.png" class="img-responsive">
	  <br>
    <div class="row">
      <div class='col-md-4' align='middle'>
        <div class="panel panel-default">
          <img src="img/cards/ico_descubre_comercios.png" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Hay cientos de comercios esperando por ti!</p>
          </div>
        </div>
      </div>

      <div class='col-md-4' align='middle'>
        <div class="panel panel-default">
          <img src="img/cards/ico_descubre_panoramas.png" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Conoce que comentan los comercios en tiempo real.</p>
          </div>
        </div>
      </div>

      <div class='col-md-4' align='middle'>
        <div class="panel panel-default">
          <img src="img/cards/ico_premios.png" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Acumula Yavu Coins y accede a beneficios.</p>
          </div>
        </div>
      </div>
    </div>
      <br>
	    @if(!Auth::user()->check())
        <div align="middle">
          <a data-toggle="modal" data-target="#gridSystemModal" role="button" href="#!">
            <img src="img/cards/registrate_01a.png" class="img-responsive" >
          </a>
          <br>
          <img src="img/cards/barra_separadora.png" class="img-responsive">
        </div>
        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div align="center"> <h4 class="modal-title" id="gridSystemModalLabel">Registrate gratis!</h4></div>
              </div>
              <div class="modal-body">
                <div id="" style="border: dashed; border-width: 2px; padding: 10px 10px 10px 10px;">
                  @include('alerts.alertFields')

                  <div>
                    {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST', 'id' => 'FormRegistroLanding'])!!}
                      @include('usuarios.forms.fieldsLanding')
                      <div class="form-group has-feedback has-feedback-left">
                        {!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style' => 'width:100%;', 'onclick' => 'ValidarRegistro()'])!!}
                      </div>
                      <div class="form-group has-feedback has-feedback-left">
                        <a class="btn btn-primary" href='{!! url("social/facebook") !!}'>
                          <span>
                            <img src="{!! URL::to('/images/facebook.png') !!}" width="7%" alt="">
                            Iniciar sesión con Facebook
                          </span>
                        </a>
                      </div>
                    {!!Form::close()!!}
                  </div>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
	    @endif
    </div><!-- /.row -->
  </div>
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
