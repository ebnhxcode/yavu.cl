@extends('layouts.front')
@section('content')
@include('layouts.bannerFront')
<div class="jumbotron">
  <div id="contentMiddle" class="container">
    @include('alerts.errorsMessage')
    <div class="row">
      <div class="col-md-5">


        <div id="" style="border: dashed; border-width: 2px; padding: 10px 10px 10px 10px;">
          <div align="center"><h1>Registrate gratis!</h1></div>
          @include('alerts.alertFields') 
          <div>
            {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST'])!!}
              @include('usuarios.forms.fieldsLanding')
              <div class="form-group has-feedback has-feedback-left">
                {!!Form::label('Registrate ya!')!!}
                {!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success'])!!}
              </div>
            {!!Form::close()!!}                    
          </div> 
        </div>
        <br /><br />    

      </div>

      <div class="col-md-4">
        <div class="fb-page" data-href="https://www.facebook.com/Yavucl-1508348302804625/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="500" data-height="500" data-hide-cover="false" data-show-facepile="true"></div>        
      </div>

     

    </div>


    <div class="row">
      

        <img src="img/cards/barra_separadora.png" class="img-responsive">
        <br>

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
        <br>
        <div align="middle">
        <img src="img/cards/registrate_01a.png" class="img-responsive" >
        <br>
        <img src="img/cards/barra_separadora.png" class="img-responsive">
        </div>

    </div>

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
}(document, 'script', 'facebook-jssdk'));</script>
