<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>@yield('title') | Yavu.cl</title>
		<meta name="description" content="Yavu es una empresa de publicidad que ofrece a sus usuarios activos la oportunidad de obtener coins a partir de las publicaciones para que puedan participar por los sorteos que las empresas publican.">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		@yield('favicon')
		{!!Html::script('js/jquery.js')!!}
		{!!Html::script('js/all.js')!!}

		@if(Auth::user()->check())

			{!!Html::script('js/vendor/jquery.timeago.js')!!}

			{!!Html::script('js/ajax/FrontNotificaciones.js')!!}

			{!!Html::script('js/ajax/GestionarCoins.js')!!}

			{!!Html::script('js/plugins.js')!!}

			{!!Html::script('js/ajax/GestionarCompraTicket.js')!!}

		@endif


		{!!Html::script('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')!!}
		{!!Html::style('css/app.css')!!}
		{!!Html::style('css/style.css')!!}

		<script>$.ajaxSetup({ cache:false });</script>
		<script>$.ajaxSetup({ headers: { 'csrftoken' : '{!! csrf_token() !!}' } });</script>
		<script>$.ajaxSetup({ headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')}});</script>
		@if(Request::path() != 'login' && Request::path() != 'contacto')
		<style>
			body {
				padding-top:50px;
				padding-bottom: 20px;
			}
		</style>
		@else
			<style type="text/css">
				body {
					background: url(/img/users/iniciar_sesion.jpg) no-repeat fixed top center;
					padding-top:50px;
					padding-bottom: 20px;
				}
			</style>
		@endif
	</head><!--/head -->
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand" style="width: 135px;padding-right: 0px;padding-left: 20px;">
						<a href="{{URL::to('/')}}"><img id="LogoYavu" src="{!! asset('img/yavu004.png') !!}" width="70%" style="transition: width 0.8s;" width="50%"></a>
					</div>
					@if(Auth::user()->check())
						<div class="navbar-brand" align="center" >
							<small>
                <!-- <img src="{!! asset('/img/newGraphics/neo_notificacion04_16x16.png') !!}" width="" id="Notificaciones" title="Notificaciones <a href='/pops' style='float: right;'>ver todas</a>" data-toggle="popover" title="Popover title" data-placement="bottom" aria-hidden="true" alt=""> -->
								<span id="Notificaciones" title="<span style='color: #000;'>Notificaciones</span> <a href='/pops' style='float: right;'>ver todas</a>" class="glyphicon glyphicon-bell" data-toggle="popover" title="Popover title" data-placement="bottom" aria-hidden="true" alt=""></span>

								<span id="CantidadNotificaciones" style="float:right;" class="label label-danger"></span>
							</small>
						</div>

						<div class="navbar-brand" align="center">
							<small>
								<!-- <img width="" src="/img/newGraphics/neo_tickets02_16x16.png" alt=""> -->
								<span class="glyphicon glyphicon-piggy-bank"></span>
								<span id="" style="float:right;" class="label label-warning CantidadCoins"></span>
							</small>
						</div>
						<div class="navbar-brand" align="center">

							<!-- <span class="glyphicon glyphicon-tag" style="font-size: 1.2em; color: #BEF781;"></span> -->

							<small>
								<!-- <img width="22px" src="/img/newGraphics/neo_tickets01_32x32.gif" alt=""> -->
								<span class="glyphicon glyphicon-tag"></span>
								<span id="CantidadTickets" style="float:right;" class="label label-info"></span>
							</small>
						</div>


						<!--
						<div class="navbar-brand">
							<a href="#!">
								<span id="Mensajes" title="Mensajes" data-toggle="popover" title="Popover title" data-placement="bottom" class="glyphicon glyphicon-envelope" style="font-size: 1em;" aria-hidden="true">
									<small><span id="CantidadMensajes" class="label label-danger"></span></small>
								</span>
							</a>
						</div>
						-->
					@endif
				</div><!-- /navbar-header -->

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						@if(!Auth::user()->check() && !Auth::empresa()->check() && !Auth::admin()->check())
							<li class="dropdown"><a href="{!!URL::to('/nosotros')!!}"><span role="button" class="navbar-button-hover">NUESTRA EMPRESA</span></a></li>
							<li class="dropdown"><a href="{!!URL::to('/yavucoins')!!}"><span role="button" class="navbar-button-hover">YAVU COINS</span></a></li>
							<li class="dropdown"><a href="{!!URL::to('/contacto')!!}"><span role="button" class="navbar-button-hover">CONTACTO</span></a></li>
							@if(Request::path() != 'login')
							<li class="dropdown"><a href="{!!URL::to('/login')!!}"><span role="button" style="background: transparent;" class="navbar-button-border">INICIAR SESIÓN</span></a></li>
							@endif
						@endif
						@if(Auth::user()->check())
							{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
							{!!Form::hidden('idUltimaNotificacion', "0", ['id'=>'idUltimaNotificacion'])!!}
							<li class="dropdown"><a href="#!" data-toggle="dropdown" class="dropdown-toggle"><strong>Mi cuenta</strong> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/profile')!!}">Perfil</a></li>
									<li><a href="{!!URL::to('/tickets/history')!!}">Historial de ticket's</a></li>
									<li><a href="{!!URL::to('/coins/history')!!}">Historial de coins</a></li>
									<li><a href="{!!URL::to('/empresas/create')!!}">Crear empresa</a></li>
								</ul>
							</li>

							<li class="dropdown"><a href="#!" data-toggle="dropdown" class="dropdown-toggle"><img width="40" src="{!! asset('img/yavu019.png') !!}" alt=""><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li class="dropdown">
										<a href="{!!URL::to('/dashboard')!!}">
											Inicio
										</a>
									</li>
									<li class="dropdown">
										<a href="{!!URL::to('/feeds')!!}">
											Publicaciones
										</a>
									</li>
									<li class="dropdown">
										<a href="{!!URL::to('/empresas')!!}">
											Empresas
										</a>
									</li>
									<li class="dropdown">
										<a href="{!!URL::to('/sorteos')!!}">
											Sorteos
										</a>
									</li>
								</ul>
							</li>

							<li class="dropdown"><a href="#!" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-cog" style="font-size: 1.3em; color: #BEF781;"></span><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/logout')!!}">Cerrar sesión <span class="glyphicon glyphicon-off text-danger"></span></a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="{!!URL::to('/sorteos')!!}"></a>
							</li>
						@endif
						@if(Auth::admin()->check())
							<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Registrar empresa<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/empresas/create')!!}">Registro de empresas</a></li>
									<li><a href="{!!URL::to('/empresas')!!}">Mostrar listado de empresas</a></li>
									<li><a href="{!!URL::to('/sorteos')!!}">Sorteos por confirmar</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Administraci&oacute;n<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/admins/create')!!}">Registro de Administradores</a></li>
									<li><a href="{!!URL::to('/admins')!!}">Mostrar listado de Administradores</a></li>
								</ul>
							</li>
							<li>
								<a href="{!!URL::to('/logout')!!}">Salir</a>
							</li>
						@endif
					</ul><!-- /ul navbar -->
				</div><!--/.navbar-collapse -->

			</div><!-- /container -->
		</nav><!-- /navbar-inverse -->

		@yield('content')

		@if(Request::path() != 'login' && Request::path() != 'contacto')
		<div class="container">
			<footer class="site-footer">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<img alt="Imagen corfo" src= "{!!URL::to('img/footer/corfo.png')!!}" class="img-responsive-centered"/></a>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
						{{--
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_facebook.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_twitter.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/ico_instagram.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_youtube.png')!!}" class=""/></a></span>
						--}}
						<br>
						<br>
						<span><a class="btn-link" href="{!!URL::to('/nosotros/')!!}">Nuestra empresa</a></span>
						<span class="required">\</span>
						<span><a class="btn-link" href="{!!URL::to('/contacto/')!!}">Contacto</a></span>
						<span class="required">\</span>
						<span><a class="btn-link" href="{!!URL::to('/terminos/')!!}">Terminos</a></span>
						<span class="required">\</span>
						<span><a class="btn-link" href="{!!URL::to('/yavucoins/')!!}"><strong>YavuCoins</strong></a></span>
						<spam> - Copyright© ~ Yavu.cl 2016.</spam>
					</div>
				</div><!-- /div row -->
			</footer><!-- /footer -->
		</div> <!-- /container -->
		@endif
		<!-- Google Analytics -->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-76276902-1', 'auto');
		  ga('send', 'pageview');
		</script>
		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '457382627805002',
					xfbml      : true,
					version    : 'v2.5'
				});
			};

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</body>
</html>