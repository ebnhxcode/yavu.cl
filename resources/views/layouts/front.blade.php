<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Yavu.cl</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		{!!Html::script('js/jquery.js')!!}
		{!!Html::script('js/vendor/jquery.timeago.js')!!}
		{!!Html::script('js/vendor/bootstrap.min.js')!!}
		{!!Html::script('js/plugins.js')!!}
		{!!Html::script('js/ajax/FrontNotificaciones.js')!!}
		{!!Html::style('css/bootstrap.css')!!}
		{!!Html::script('js/global.js')!!}
    {!!Html::script('js/ajax/GestionarCoins.js')!!}
		{!!Html::script('js/ajax/GestionarCompraTicket.js')!!}
		{!!Html::style('css/style.css')!!}
		{!!Html::script('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')!!}
			<!-- {!!Html::style('css/main.css')!!} -->
		<script>$.ajaxSetup({ cache:true });</script>
		<script>$.ajaxSetup({ headers: { 'csrftoken' : '{!! csrf_token() !!}' } });</script>
		<script>$.ajaxSetup({headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}});</script>

		<style>
			body {
				padding-top:50px;
				padding-bottom: 20px;
			}
		</style>
	</head>
	<body>
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


		<nav class="navbar navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand" style="width: 135px;padding-right: 0px;padding-left: 20px;">
						<a href="{{URL::to('/')}}"><img src={{asset('img/yavu004.png')}} style="transition: width 0.8s;" width="70%"></a>
						{{-- <img id="LogoYavu" src="{!!URL::to('img/yavu004.png')!!}" style="transition: width 0.8s;" width="50%" /> --}}
					</div>
					@if(Auth::user()->check())
						<div class="navbar-brand"  align="center" >
							<a href="#!">
								<span id="Notificaciones" title="Notificaciones" data-toggle="popover" title="Popover title" data-placement="bottom" class="glyphicon glyphicon-globe" style="font-size: 1.2em; color: #BEF781;" aria-hidden="true"></span>
                <small><span id="CantidadNotificaciones" style="float:right;" class="label label-danger"></span></small>
							</a>
						</div>
						<div class="navbar-brand" align="center">
							<span class="glyphicon glyphicon-certificate" style="font-size: 1.2em; color: #BEF781;"></span>
							<small><span id="" style="float:right;" class="label label-warning CantidadCoins"></span></small>
						</div>
						<div class="navbar-brand" align="center">
							<span class="glyphicon glyphicon-tag" style="font-size: 1.2em; color: #BEF781;"></span>
							<small><span id="CantidadTickets" style="float:right;" class="label label-info"></span></small>
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
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						@if(!Auth::user()->check() && !Auth::empresa()->check() && !Auth::admin()->check() && Request::path() !== 'login')
							<li class="dropdown"><a href="{!!URL::to('/login/')!!}"><span role="button" style="background: transparent;" class="btn btn-warning btn-xs">INICIA SESIÓN</span></a></li>
							<li class="dropdown"></li>
						@endif
						@if(Auth::user()->check())
							{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
							{!!Form::hidden('idUltimaNotificacion', "0", ['id'=>'idUltimaNotificacion'])!!}
							<li class="dropdown">
								<a href="{!!URL::to('/dashboard')!!}">
									<strong>Inicio</strong>
								</a>
							</li>
							<li class="dropdown">
								<a href="{!!URL::to('/feeds')!!}">
									<strong>Publicaciones</strong>
								</a>
							</li>
							<li class="dropdown">
								<a href="{!!URL::to('/empresas')!!}">
									<strong>Empresas</strong>
								</a>
							</li>
							<li class="dropdown">
								<a href="{!!URL::to('/sorteos')!!}">
									<strong>Sorteos</strong>
								</a>
							</li>
							<li class="dropdown"><a href="#!" data-toggle="dropdown" class="dropdown-toggle"><strong>Mi cuenta</strong>  <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/profile')!!}">Perfil</a></li>
									<li><a href="{!!URL::to('/dashboard')!!}">Mis empresas</a></li>
									<li><a href="{!!URL::to('/logout')!!}">Cerrar sesión</a></li>
								</ul>
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
							<!--
							<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pagos<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/empresas')!!}">Registrar pago</a></li>
									<li><a href="{!!URL::to('/empresas')!!}">Mostrar listado de deudores</a></li>
								</ul>
							</li>
							-->
							<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Admintración<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/admins/create')!!}">Registro de Administradores</a></li>
									<li><a href="{!!URL::to('/admins')!!}">Mostrar listado de Administradores</a></li>
								</ul>
							</li>
							<li>
								<a href="{!!URL::to('/logout')!!}">Salir</a>
							</li>
						@endif
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>
		@yield('content')
		<div class="container">
			<!-- footer -->
			<footer role="contentinfo" class="site-footer" id="colophon">
				<div class="row">
					<div class="col-md-12">
						<img alt="Imagen corfo" src= "{!!URL::to('img/footer/corfo.png')!!}" class="img-responsive-centered"/></a>
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-12" style="text-align: center;">
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_facebook.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_twitter.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/ico_instagram.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_youtube.png')!!}" class=""/></a></span>
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
				</div>
			</footer>
			<!-- /footer -->
		</div> <!-- /container -->
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-76614948-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</body>
</html>