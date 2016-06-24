@section('favicon') {!!Html::favicon('favicons/user.png')!!} @stop
@section('title') Create new @stop
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<div class='row'>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-lg12-md12-sm12-xs12 -->

      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

      </div>


      <div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
        {!!Form::open([route('usuarios_create_path'), 'method'=>'POST', 'files' => true])!!}
        @include('usuarios.forms.fieldsUser')
        {!!Form::submit('Registrar', ['class'=>'btn btn-success', 'style'=>'width:100%;'])!!}
        {!!Form::close()!!}
      </div><!-- /div .col-lg4-md4-sm12-xs12 -->


      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class='list-group'>
          <div class='list-group-item'>
            <div class='form-group has-feedback has-feedback-left'>

            </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
          </div><!-- /div .list-group-item -->
        </div><!-- /div .list-group -->
      </div><!-- /div .col-lg4-md4-sm12-xs12 -->

		</div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
