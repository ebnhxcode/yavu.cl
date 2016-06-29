@section('favicon') {!!Html::favicon('favicons/user.png')!!} @stop
@section('title') Create new @stop
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<div class='row'>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div align="center">
          <a href="/"><img width="32px" src="/img/yavu019.png" alt=""/></a>
          <h3>¿Nuevo en Yavü?</h3>
          <h3><span class="softText-descriptions">Reg&iacute;strate ahora, es f&aacute;cil y gratis!</span></h3>
        </div>
        @include('alerts.allAlerts')
      </div><!-- /div col-lg12-md12-sm12-xs12 -->

      {!!Form::open([route('usuarios_create_path'), 'method'=>'POST', 'files' => true, 'autocomplete' => 'off'])!!}

      <div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
        @include('usuarios.forms.fieldsUserCompletePartial.basicFields')
      </div><!-- /div .col-lg3-md3-sm12-xs12 -->

      <div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
        @include('usuarios.forms.fieldsUserCompletePartial.advancedFields')
      </div><!-- /div .col-lg3-md3-sm12-xs12 -->

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        @include('usuarios.forms.fieldsUserCompletePartial.finallyFields')
      </div><!-- /div .col-lg3-md3-sm12-xs12 -->
      <div align="center" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <img src="/img/newGraphics/icono_final_perfil.png" alt="">
      </div><!-- /div .col-lg3-md3-sm12-xs12 -->
      

      {!!Form::close()!!}

		</div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
