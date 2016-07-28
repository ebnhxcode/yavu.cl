<!doctype html>
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

		<style>
		  @font-face {
			font-family: yavu_font;
			src: url("/fonts/yavu_font.ttf");
		  }
		  /**/
		</style>
		@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
		@yield('favicon')
		{!!Html::script('js/jquery.js')!!}
		{!!Html::script('js/all.js')!!}

		@if(Auth::user()->check())

			{!!Html::script('js/vendor/jquery.timeago.js')!!}

			{!!Html::script('js/ajax/FrontNotificaciones.js')!!}

			{!!Html::script('js/ajax/GestionarCoins.js')!!}

			{!!Html::script('js/plugins.js')!!}

			{!!Html::script('js/ajax/GestionarCompraTicket.js')!!}

			{!!Html::script('js/ajax/SeguirEmpresa.js')!!}

		@endif
		{!!Html::script('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')!!}
		{!!Html::style('css/app.css')!!}
		{!!Html::style('css/style.css')!!}

		<script>$.ajaxSetup({ cache:false });</script>
		<script>$.ajaxSetup({ headers: { 'csrftoken' : '{!! csrf_token() !!}' } });</script>
		<script>$.ajaxSetup({ headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')}});</script>
		<script>
		  $(function () {
			$('[data-toggle="tooltip"]').tooltip()
		  });
		  $('#TabUserProfile a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		  });

		</script>
		<style>
			body {
				padding-top:50px;
				padding-bottom: 20px;
			}
		</style>
	</head><!--/head -->
	<body id="body">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					@if(Auth::user()->check())
						<div class="navbar-brand navbar-brand-centered hidden-xs" style="width: 135px;padding-right: 0px;padding-left: 20px;">
							<a href="{{URL::to('/dashboard')}}"><img id="LogoYavu" src="{!! asset('img/yavu004.png') !!}" width="70%" style="transition: width 0.8s;" width="50%"></a>
						</div>
					@else
						<div class="navbar-brand" style="width: 135px;padding-right: 0px;padding-left: 20px;">
							<a href="{{URL::to('/')}}"><img id="LogoYavu" src="{!! asset('img/yavu004.png') !!}" width="70%" style="transition: width 0.8s;" width="50%"></a>
						</div>
					@endif
					@if(Auth::user()->check())
						<!-- DEPRECATED #1 -->

						<!-- demo 1 / navbar direct links -->

						<div class="navbar-brand visible-xs" align="center" style="padding-right: 0px;padding-left: 30px;">
							<a href="{{URL::to('/feeds')}}">
								<span class="glyphicon glyphicon-list-alt" id="logIcon" style="color: {{(Request::path()=='feeds')?'#FFFFff;':'#2b542c;'}}"></span>
							</a>
						</div>
						<div class="navbar-brand visible-xs" align="center" style="padding-right: 0px;padding-left: 30px;">
							<a href="{{URL::to('/empresas')}}">
								<span class="glyphicon glyphicon-briefcase" id="logIcon" style="color: {{(Request::path()=='empresas')?'#FFFFff;':'#2b542c;'}}"></span>
							</a>
						</div>
						<div class="navbar-brand visible-xs" align="center" style="padding-right: 20px;padding-left: 30px;">
							<a href="{{URL::to('/sorteos')}}">
								<span class="glyphicon glyphicon-gift" id="logIcon" style="color: {{(Request::path()=='sorteos')?'#FFFFff;':'#2b542c;'}}"></span>
							</a>
						</div>

					<!-- fin demo 1 -->

						<div class="navbar-brand visible-xs" align="center">
							<small>
								<!-- <img width="" src="/img/newGraphics/neo_tickets02_16x16.png" alt=""> -->

								<span data-toggle="tooltip" data-placement="right" title="Yavucoins" style="font-family: yavu_font;font-size: 1.6em;color: #FFE955;">J</span>
								{{-- $ {{money_format('%(#10n', count($userSession->registro_coins)) . "\n"}} --}}

								<span id="" style="float:right;" class="label label-warning CantidadCoins">{{isset($userSession)?'$ '.number_format($userSession->coins()->sum('cantidad') , 0, '', ','):''}}</span>

							</small>
						</div>
						<!-- DEPRECATED #2 -->
					@endif

				</div><!-- /navbar-header -->

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-left">
						@if(Auth::user()->check())
							<div class="navbar-brand hidden-xs" align="center" style="padding-right: 0px;padding-left: 40px;">
								<a href="{{URL::to('/feeds')}}">
									<span class="glyphicon glyphicon-list-alt" id="logIcon" style="color: {{(Request::path()=='feeds')?'#FFFFff;':'#2b542c;'}}"></span>
								</a>
							</div>
							<div class="navbar-brand hidden-xs" align="center" style="padding-right: 0px;padding-left: 40px;">
								<a href="{{URL::to('/empresas')}}">
									<span class="glyphicon glyphicon-briefcase" id="logIcon" style="color: {{(Request::path()=='empresas')?'#FFFFff;':'#2b542c;'}}"></span>
								</a>
							</div>
							<div class="navbar-brand hidden-xs" align="center" style="padding-right: 20px;padding-left: 40px;">
								<a href="{{URL::to('/sorteos')}}">
									<span class="glyphicon glyphicon-gift" id="logIcon" style="color: {{(Request::path()=='sorteos')?'#FFFFff;':'#2b542c;'}}"></span>
								</a>
							</div>

							{{-- <li class="hidden-xs"><a href="{!!URL::to('/feeds')!!}"><strong>Publicaciones</strong></a></li>
							<li class="hidden-xs"><a href="{!!URL::to('/empresas')!!}"><strong>Empresas</strong></a></li>
							<li class="hidden-xs"><a href="{!!URL::to('/sorteos')!!}"><strong>Sorteos</strong></a></li> --}}
						@endif
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if(!Auth::user()->check() && !Auth::empresa()->check() && !Auth::admin()->check())
						  @if(Request::path() != 'login' && Request::path() != 'usuarios/create')

							<div class="" align="">

							  <!-- Formulario inicio sesión -->
							  <div id="navbar" align="center" class="navbar-collapse">

								{!!Form::open(['route' => 'log.store', 'method' => 'POST', 'class' => 'navbar-form navbar-right', 'role' => 'form'])!!}

									<div class='form-group has-feedback has-feedback-left'>
										<div class="input-group input-group-sm">
											{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email', 'autocomplete' => 'off'])!!}
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-user"></i>
											</div><!-- /div .input-group-addon -->
										</div><!-- /div .input-group .input-group-sm -->
									</div><!-- /div .form-group .has-feedback .has-feedback-left  -->

									<div class='form-group has-feedback has-feedback-left'>
										<div class="input-group input-group-sm">
											{!!Form::password('password',['class'=>'form-control','placeholder'=>'Clave', 'autocomplete' => 'off'])!!}
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-lock"></i>
											</div><!-- /div .input-group-addon -->
										</div><!-- /div .input-group .input-group-sm -->
									</div><!-- /div .form-group .has-feedback .has-feedback-left  -->

								<input type="hidden" name="_token" value="{!! csrf_token() !!}"><!-- /input token -->

								<button type="submit" class="btn btn-success btn-sm">Iniciar sesi&oacute;n </button>
								<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#gridSystemModal" role="button">Reg&iacute;strate</a>
								<a href='{!! url("social/facebook") !!}'>
									<img src= "{!!URL::to('img/footer/icono_facebook.png')!!}" width="3.78%"/>
								</a>
								<a href="#!" class="text-success" data-toggle="modal" data-target="#myModal"><small>¿Haz Olvidado tu Clave?</small></a>

								{!!Form::close()!!}
							  </div><!--/.navbar-collapse -->
							  <!-- End Formulario inicio sesión -->
							</div><!-- /div -->


						  @endif
						  <!-- DEPRECATED #3 -->

						@endif
						@if(Auth::user()->check())
								{{-- <li class="hidden-xs"><a href="{!!URL::to('/feeds')!!}"><strong>Publicaciones</strong></a></li>
								<li class="hidden-xs"><a href="{!!URL::to('/empresas')!!}"><strong>Empresas</strong></a></li>
								<li class="hidden-xs"><a href="{!!URL::to('/sorteos')!!}"><strong>Sorteos</strong></a></li> --}}
								<div class="navbar-brand hidden-xs" align="center">
									<small>
										<!-- <img width="" src="/img/newGraphics/neo_tickets02_16x16.png" alt=""> -->

										<span data-toggle="tooltip" data-placement="right" title="Yavucoins" style="font-family: yavu_font;font-size: 1.6em;color: #FFE955;">J</span>
										{{-- $ {{money_format('%(#10n', count($userSession->registro_coins)) . "\n"}} --}}

										<span id="" style="float:right;" class="label label-warning CantidadCoins">{{isset($userSession)?'$ '.number_format($userSession->coins()->sum('cantidad') , 0, '', ','):''}}</span>

									</small>
								</div>
							{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
							{!!Form::hidden('idUltimaNotificacion', "0", ['id'=>'idUltimaNotificacion'])!!}

								<li class="dropdown"><a href="#!" data-toggle="dropdown" class="dropdown-toggle"><strong>Mi cuenta</strong> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{!!URL::to('/profile')!!}">Perfil</a></li>
									<li><a href="{!!URL::to('/pops')!!}">Notificaciones</a></li>
									{{--
									<li><a href="{!!URL::to('/tickets/history')!!}">Historial de ticket's</a></li>
									<li><a href="{!!URL::to('/coins/history')!!}">Historial de coins</a></li>
									--}}

                    			<li class="hideifhasone"><a href="{!!URL::to('/empresas/create')!!}">Crear empresa</a></li>

								  @if(isset($userSession))
									@foreach($userSession->userCompanies as $company)
									  <li>
										<a href="{!!URL::to('/empresas/'.$company->id)!!}">
										  <small class="softText">Ver perfil de</small>
										  <img id="ImagenPerfil" src="/img/users/{!!($company->imagen_perfil!='')?$company->imagen_perfil:'banner.png'!!}" alt="..." style="width: 30px; height: 30px; border-radius: 10%;">
										  <strong>{!! $company->nombre !!}</strong><br/>

										</a>
									  </li>
									@endforeach
								  @endif
									<li role="separator" class="divider"></li>
									<li><a href="{!!URL::to('/logout')!!}">Cerrar sesión <span class="glyphicon glyphicon-off text-danger"></span></a></li>

								</ul>
							</li>
							<!-- DEPRECATED #4 -->



							<li class="dropdown">
								<a href="{!!URL::to('/sorteos')!!}"></a>
							</li>
						@endif
						@if(Auth::admin()->check())
							<li>
								<a href="{!!URL::to('/admins')!!}">Inicio</a>
						  	</li>
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
		<!-- DEPRECATED #5 -->

		@if(Auth::user()->check())
			@if(Request::path() === 'empresas' || Request::path()  === 'sorteos' || Request::path()  === 'feeds')
				<div class="panel panel-default fijar" style="margin-bottom: 0px;  z-index: 1000; width: 100%;">
					<div class="panel-body visible-xs-block" style=" padding: 8px 15px 0px 10px;">
						<div class="row">
							<div class="col-xs-10">
								<h4>@yield('title')</h4>
							</div>
							<div class="col-xs-2 text-right">
								<a href="{{ URL::to('/dashboard/') }}" class="btn btn-success btn-sm" role="button">Atr&aacute;s</a>
							</div>
						</div>
					</div>
				</div>
			@else
				@if(Request::path() === 'dashboard')
					<div class="panel panel-default fijar" style="margin-bottom: 0px;  z-index: 1000; width: 100%;">
						<div class="panel-body visible-xs-block" style=" padding: 8px 15px 0px 10px;">
							<div class="row">
								<div class="col-xs-10">
									<h4>@yield('title')</h4>
								</div>

							</div>
						</div>
					</div>
				@else
				<div class="panel panel-default fijar" style="margin-bottom: 0px;  z-index: 1000; width: 100%;">
					<div class="panel-body visible-xs-block" style=" padding: 8px 15px 0px 10px;">
						<div class="row">
							<div class="col-xs-10">
								<h4>@yield('title')</h4>
							</div>
							<div class="col-xs-2 text-right">
								<a href="{{ URL::previous() }}" class="btn btn-success btn-sm" role="button">Atr&aacute;s</a>
							</div>
						</div>
					</div>
				</div>
					@endif
			@endif
		@endif

		@yield('content')


		@if(Request::path() != 'login' && Request::path() != 'contacto')
		<div class="container" style="background-color: #fff; width:100%;">
			<footer class="site-footer">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img width="100" alt="Imagen corfo" src= "{!!URL::to('img/footer/corfo.png')!!}" class="img-responsive-centered"/></a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
						{{--
						<span><a href="#!"></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_twitter.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/ico_instagram.png')!!}" class=""/></a></span>
						<span><a href="#!"><img  src= "{!!URL::to('img/footer/icono_youtube.png')!!}" class=""/></a></span>
						--}}
						<br>
						<br>
						<span><a class="btn-link" href="{!!URL::to('/faq/')!!}">Preguntas Frecuentes</a></span>
						<span class="required">\</span>
						<span><a class="btn-link" href="{!!URL::to('/nosotros/')!!}">Nuestra empresa</a></span>
						<span class="required">\</span>
						<span><a class="btn-link" href="{!!URL::to('/contacto/')!!}">Contacto</a></span>
						<span class="required">\</span>
						<span><a class="btn-link" href="{!!URL::to('/terminos/')!!}">Términos y Condiciones</a></span>
						<span class="required">\</span>
						<span><a class="btn-link" href="{!!URL::to('/yavucoins/')!!}"><strong>YavuCoins</strong></a></span>
						<br><span> - Copyright© ~ Yavu.cl 2016 - </span>
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

{{--
<!-- deprecated code ahead -->

<!-- DEPRECATED #1 -->
<div class="navbar-brand" align="center" >
	<small>
<!-- <img src="{!! asset('/img/newGraphics/neo_notificacion04_16x16.png') !!}" width="" id="Notificaciones" title="Notificaciones <a href='/pops' style='float: right;'>ver todas</a>" data-toggle="popover" title="Popover title" data-placement="bottom" aria-hidden="true" alt=""> -->

				<span id="Notificaciones" title="<span style='color: #000;'>Notificaciones</span> <a href='/pops' style='float: right;'>ver todas</a>" class="" data-toggle="popover" title="Popover title" data-placement="bottom" aria-hidden="true" alt="">
  <span data-toggle="tooltip" data-placement="left" title="Notificaciones!" style="font-family: yavu_font; font-size: 1.6em;color: #E68F8F;">A</span>
</span>

		<span id="CantidadNotificaciones" style="float:right;" class="label label-danger"></span>
	</small>
</div>
--}}

{{--
<!-- DEPRECATED #2 -->
<div class="navbar-brand" align="center">

	<!-- <span class="glyphicon glyphicon-tag" style="font-size: 1.2em; color: #BEF781;"></span> -->

	<small>
		<!-- <img width="22px" src="/img/newGraphics/neo_tickets01_32x32.gif" alt=""> -->
		<a href="/tickets">
			<span data-toggle="tooltip" data-placement="right" title="Tickets" style="font-family: yavu_font;font-size: 1.6em;color:#57E5DB;">E</span>
			<span id="CantidadTickets" style="float:right;" class="label label-info"></span>
		</a>
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
--}}


<!-- DEPRECATED #3 -->

{{--
			<li class="dropdown"><a href="{!!URL::to('/nosotros')!!}"><span role="button" class="navbar-button-hover">NUESTRA EMPRESA</span></a></li>
			<li class="dropdown"><a href="{!!URL::to('/yavucoins')!!}"><span role="button" class="navbar-button-hover">YAVU COINS</span></a></li>
			<li class="dropdown"><a href="{!!URL::to('/contacto')!!}"><span role="button" class="navbar-button-hover">CONTACTO</span></a></li>
--}}

{{-- <li class="dropdown"><a href="{!!URL::to('/login')!!}"><span role="button" style="background: transparent;" class="navbar-button-border">INICIAR SESIÓN</span></a></li> --}}

{{--
<!-- DEPRECATED #4 -->

<li class="dropdown hidden-xs"><a href="#!" data-toggle="dropdown" class="dropdown-toggle"><img width="40" src="{!! asset('img/yavu019.png') !!}" alt=""><b class="caret"></b></a>
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
--}}

{{--
<!-- DEPRECATED #5 -->
<!-- demo 2 / testeo de navbar bottom -->
@if(Auth::user()->check())
<nav class="navbar navbar-default navbar-fixed-bottom visible-xs">
	<div class="container">
		<div class="navbar-header">
			<div class="navbar-brand" align="center">
				<small>
					<span data-toggle="tooltip" data-placement="right" title="Yavucoins" style="font-family: yavu_font;font-size: 1.6em;color: #FFE955;">J</span>
					<span id="" style="float:right;" class="label label-warning CantidadCoins">{{isset($userSession)?'$ '.number_format($userSession->coins()->sum('cantidad') , 0, '', ','):''}}</span>
				</small>
			</div>
			<div class="navbar-brand" align="center">
				<small>
					<a href="/tickets">
						<span data-toggle="tooltip" data-placement="right" title="Tickets" style="font-family: yavu_font;font-size: 1.6em;color:#57E5DB;">E</span>
						<span id="CantidadTickets" style="float:right;" class="label label-info"></span>
					</a>
				</small>
			</div>
		</div>
	</div>
</nav>
@endif
--}}