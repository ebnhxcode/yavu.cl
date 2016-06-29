@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!!$user->nombre!!} @stop
@extends('layouts.front')
@section('content')

	<div class='jumbotron'>
		<div id='contentMiddle'>
			<div class='row'>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					@include('alerts.allAlerts')
				</div><!-- /div col-md12-sm12-xs12 -->

				<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
					<!-- para algún diseño -->
				</div><!-- /div .col-lg3-md3-sm12-xs12 -->

				{!!Form::model($user, ['method'=>'PUT', route('usuarios_put_path', $user->id), 'files' => true, 'id' => 'FormUsuario'])!!}

					<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
						@include('usuarios.forms.fieldsUserCompletePartial.basicFields')
						@include('usuarios.forms.fieldsUserCompletePartial.advancedFields')
						@include('usuarios.forms.fieldsUserCompletePartial.finallyFields')
					</div><!-- /div .col-lg3-md3-sm12-xs12 -->

				{!!Form::close()!!}

				<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
					<!-- para algún diseño -->
				</div><!-- /div .col-lg3-md3-sm12-xs12 -->


			</div><!-- /div .row -->
		</div><!-- /div #contentMiddle -->
	</div><!-- /div .jumbotron -->


@stop





