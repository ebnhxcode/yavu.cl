@section('favicon') {!!Html::favicon('favicons/user.png')!!} @stop
@section('title') {!! $user->nombre !!} profile @stop
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<div class='row' style='margin-top:-35px;'>
				<div class="col-md-12 col-sm-12 col-xs-12">
					@include('alerts.allAlerts')
				</div><!-- /div .col-md12-sm12-xs12 -->

				<div class='col-md-8 col-sm-6 col-xs-12'>
					<div class='list-group' >
						<div id="IPortada">
							<div class='thumbnail'>
								<img id='ImagenPortada' src='/img/users/{!! isset($user)?($user->imagen_portada!='')?$user->imagen_portada:'banner.png':'' !!}' width=100%>
							</div><!-- /div .thumbnail -->
						</div><!-- div #IPortada -->
					</div><!-- /div .list-group -->
					{!!Form::hidden('user_id', $user->id, ['id'=>'user_id'])!!}
				</div><!-- /div .col-md8-sm6-xs12 -->
				<div class='col-md-4 col-sm-6 col-xs-12'>
					<div class="list-group">
						<div class="list-group-item">
							<div class="thumbnail">
								<img id='ImagenPerfil' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'' !!}' class='center-block'>
							</div><!-- /div .thumbnail -->

							<h3>{!! $user->nombre.' '.$user->apellido !!}</h3>
							<div class="dropdown">
								<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<li>
										<a href="{!! route('usuarios_edit_path', $user->id) !!}">Editar Perfil de Usuario</a>
									</li>
								</ul>
							</div><!-- /div .dropdown -->

						</div><!-- /div .list-group-item -->
					</div><!-- /div .list-group -->

					<div class="list-group">
						@include('miniDashboard.miniDashboard')
					</div> <!-- /div .list-group -->

				</div><!-- .div-col-md4-sm6-xs12 -->
		</div><!-- /div .row -->
	</div><!-- /div #contentIn -->
</div><!-- /div .jumbotron -->
@stop<!-- /section content -->
