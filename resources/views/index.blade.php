@extends('layouts.front')
@section('content')
@include('layouts.bannerFront')
<div class="jumbotron">
  <div id="content" class="container">
    <div class="panel panel-default">
    <div class="panel-heading"><h2>Somos Yavu.cl!</h2></div>
      <div class="panel-body">

      <div class="col-sm-6">
        <a href="Pagina de corfo"><img alt="Imagen corfo" src= "images/default-img.gif" height="250px" width="420px"/></a>
      </div>

      <div class="panel panel-success col-sm-6">
        <div class="panel-heading">¡No pierdas tiempo registrate en Yavu!</div>
        <div class="panel-body">
          @include('alerts.alertFields')  
          {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST'])!!}
            @include('usuarios.forms.fieldsLanding')
            <div class="form-group has-feedback has-feedback-left col-sm-6">
              {!!Form::label('Registrate ya!')!!}
              {!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success col-sm-12'])!!}
            </div>
          {!!Form::close()!!}               
        </div>
      </div>            

     </div>
    </div>  

    <div class='row' >
      <div class='col-sm-4'>
        <div class="panel panel-default">
          <img src="" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Card Example</p>
          </div>
        </div>
      </div>

      <div class='col-sm-4'>
        <div class="panel panel-default">
          <img src="//placehold.it/450X300/ededed" class="img-responsive">
          <div class="panel-body">
            <p class='lead'>Card Example</p>
          </div>
        </div>
      </div>

      <div class='col-sm-4'>
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
@stop

