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

      <div class="col-md-2">

          <img class="img-responsive-centered" width="50%" src="http://supercon.es/wp-content/uploads/2015/09/sorteo.png">
          <img class="img-responsive-centered" width="50%" src="http://www.ratacas.com/wp-content/uploads/2014/02/tickets-1.png">
          <img class="img-responsive-centered" width="50%" src="http://static.wixstatic.com/media/07bd1d_0c383f31b485424fadbc95b78c08b4b7.png_srz_310_310_85_22_0.50_1.20_0.00_png_srz">

      </div>  
      <div class="col-md-1">
        <span style="font-size: 3em;" class="glyphicon glyphicon-globe"></span>
        <span style="font-size: 3em;" class="glyphicon glyphicon-wrench"></span>
        <span style="font-size: 3em;" class="glyphicon glyphicon-certificate"></span>
        <span style="font-size: 3em;" class="glyphicon glyphicon-dashboard"></span>
        <span style="font-size: 3em;" class="glyphicon glyphicon-pushpin"></span>
        <span style="font-size: 3em;" class="glyphicon glyphicon-signal"></span>
        <span style="font-size: 3em;" class="glyphicon glyphicon-tags"></span>
        <span style="font-size: 3em;" class="glyphicon glyphicon-user"></span>        
      </div>  

    </div>


    <div class="row">
      



      <div class='col-md-4'>
        <div class="panel panel-default">
          <img src="//placehold.it/450X300/ededed" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Card Example</p>
          </div>
        </div>
      </div>

      <div class='col-md-4'>
        <div class="panel panel-default">
          <img src="//placehold.it/450X300/ededed" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Card Example</p>
          </div>
        </div>
      </div>

      <div class='col-md-4'>
        <div class="panel panel-default">
          <img src="//placehold.it/450X300/ededed" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Card Example</p>
          </div>
        </div>
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
