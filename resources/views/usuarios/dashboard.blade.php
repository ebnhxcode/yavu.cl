{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/HistorialCoins.js')!!}
{!!Html::script('js/ajax/EmpresasDashboardUsuario.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="fullWidth">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h4 style="margin-top:-40px;"></h4>
		<div class="row">
		@if(Auth::user()->check())
			<input type="hidden" value="{!!Auth::user()->get()->id!!}" />
		@endif
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="list-group" >
				<div class="list-group-item-full-header">
					<h4>Actualiza tus datos!</h4>
				</div>
				<div class="list-group-item">
					@foreach($users as $user)
						@if ($user->sexo == 'Masculino')
							Bienvenido! {!!$user->nombre!!}
						@elseif ($user->sexo == 'Femenino')
							Bienvenida! {!!$user->nombre!!}
						@else
							Te damos la bienvenida a tu primera vez en el sitio, y gana yavu coins! <a class="btn btn-primary btn-sm" href="usuarios/{!!$user->id!!}/edit">actualiza tus datos</a>
						@endif
					@endforeach
				</div>
				<div>
					<a href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
						<span>
							<h1>PUBLICACIONES</h1>
							<img src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
						</span>
					</a>
				</div>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="list-group" >
				<a href="{!!URL::to('/empresas/create')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
					<span>
						<h1>CREAR EMPRESA</h1>
						<img  src= "{!!URL::to('img/dash/ico_empresa.png')!!}" class=""/>
					</span>
				</a>
			</div>
		</div>



			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="list-group" >
					<a href="{!!URL::to('/pops')!!}" style="text-align:center;" class="list-group-item list-group-item-danger">
						<span>
							<h1>NOTIFICACIONES</h1>
							<img  src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}" class=""/></span>
					</a>
				</div>
			</div>
		  <!-- <div class="col-md-12 col-sm-12 col-xs-12"><!--style="position:fixed;z-index:1000;"

			   <div class="list-group" >
				   <div class="list-group-item-full-header">
					   <h1>CONFIGURACION</h1>
				   </div>
				   <a href="#" style="text-align: center;" class="list-group-item list-group-item-info">
						 <span><img  src= "{!!URL::to('img/dash/ico_configurar_dash02.png')!!}" class=""/></span>

				   	</a>
			   </div> -->

			<div class="col-md-12 col-sm-12 col-xs-12">


			   <div class="list-group" >
				   <a href="{!!URL::to('/reports')!!}" style="text-align:center;" class="list-group-item list-group-item-success">
						 <span>
							 <h1>INFORMES</h1>
							 <img  src= "{!!URL::to('img/dash/icono_informe01.png')!!}" class=""/></span>
				   </a>

			   </div>


			</div>

			<div class="col-md-12 col-sm-12 col-xs-12">

			   <div class="list-group" >
				   <a href="{!!URL::to('/tickets')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
						 <span>
							 <h1>TICKETS</h1>
							 <img  src= "{!!URL::to('img/dash/ico_ticket01.png')!!}" class=""/></span>
				   </a>

			   </div>			 

			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">

				<div class="list-group" >
					<a href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
						<span>
							<h1>SORTEOS</h1>
							<img  src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}" class=""/>
						</span>
					</a>

				</div>

			   <!--
				<div class="list-group">					
					<div class="list-group-item-full-header">
						<h6>RESUMEN DE GARGAS DE COINS</h6>

					</div>					
					<div id="HistorialCoins">
											
					</div>
					<div id="FooterHistorialCoins">
						
					</div>
				</div>					   
				-->
			   <!--
			   <div class="list-group" >
					<div class="list-group-item-full-header">
						<h6>POLÍTICAS Y SERVICIOS</h6>
					</div>						
					<div class="list-group-item" style="height:80px;">
						Entérate de nuestras politicas para comenzar una actividad en Yavu.<span class="badge">14</span>
					</div>
					<a href="#" class="list-group-item list-group-item-info">Leer políticas</a>
				</div>

				<div class="list-group" >
					<div class="list-group-item-full-header">
						<h6>AYUDAS GENERALES</h6>
					</div>
					<div class="list-group-item" style="height:80px;">
						Revisa nuestras sugerencias para una mejor experiencia en yavu.
					</div>
					<a href="#" class="list-group-item list-group-item-info">Ir a ayudas generales</a>
				</div>
			   -->

		  


		</div>
	</div><!-- Fin del div id contentIn -->
</div>
	</div>
@stop




