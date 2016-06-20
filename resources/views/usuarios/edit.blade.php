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
			{!!Form::model($user, ['method'=>'PUT', route('usuarios_put_path', $user->id), 'files' => true, 'id' => 'FormUsuario'])!!}
			@include('usuarios.forms.fieldsUser')
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class='list-group'>
					<div class='list-group-item'>
						<div class='form-group has-feedback has-feedback-left'>
							{!!Form::label('Guardar')!!}
							{!!Form::submit('Guardar', ['class'=>'btn btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
							<br>
							{!!Form::close()!!}
						</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
					</div><!-- /div .list-group-item  -->
				</div><!-- /div .list-group -->
			</div><!-- /div .col-md4-sm4-xs12 -->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
