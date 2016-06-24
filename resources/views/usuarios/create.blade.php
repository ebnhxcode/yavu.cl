@section('favicon') {!!Html::favicon('favicons/user.png')!!} @stop
@section('title') Create new @stop
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<div class='row'>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

      </div>

      {!!Form::open([route('usuarios_create_path'), 'method'=>'POST', 'files' => true])!!}
      <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
        @include('usuarios.forms.fieldsUser')
      </div><!-- /div .col-md4-sm4-xs12 -->


      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class='list-group'>
          <div class='list-group-item'>
            <div class='form-group has-feedback has-feedback-left'>
              {!!Form::label('Registrar')!!}
              {!!Form::submit('Registrar', ['class'=>'btn btn-success', 'style'=>'width:100%;'])!!}
              <br>
              {!!Form::close()!!}
            </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
          </div><!-- /div .list-group-item -->
        </div><!-- /div .list-group -->
      </div><!-- /div .col-md4-sm4-xs12 -->

		</div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
