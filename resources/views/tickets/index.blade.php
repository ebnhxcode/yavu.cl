{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h1>Ticket's</h1>

		<div class="row">
			<div class="col-sm-4"><!--style="position:fixed;z-index:1000;"-->
				<div class="list-group">
					<div class="list-group-item list-group-item-success">
						<h5>FILTRO DE BÚSQUEDA</h5>
						@if(Auth::admin()->check())
							{!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
						@elseif(Auth::user()->check() || !Auth::user()->check())
							<input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
							{!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
							<br />
						@endif
					</div>
					<div class="list-group-item">
						<span class="text-danger" id="Mensaje"></span>
						<a class="btn-link" href="{!! URL::to("/sorteos/create") !!}">
							Crear nuevo sorteo
						</a><span class="label label-info">nuevo</span>
						<br>
						<a class="btn-link" style="" href="{!! URL::to('/tickets') !!}">
							Volver a sorteos
						</a><span class="label label-info">nuevo</span>
						<br>
						<a class="btn-link" style="" href="{!! URL::to('/feeds') !!}">
							Volver a publicaciones
						</a><span class="label label-info">nuevo</span>
						<br>
						<a class="btn-link" style="" href="{!! URL::to('/profile') !!}">
							Ir a mi perfil
						</a><span class="label label-info">nuevo</span>
						<br>
						<a class="btn-link" style="" href="{!! URL::to('/dashboard') !!}">
							Inicio
						</a><span class="label label-info">nuevo</span>
						<hr>

						<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							Atento al usar tus tickets participar <br>
							<span class="glyphicon glyphicon-tag" style="font-size: 1em; color: #BEF781;"></span>
							<span class="glyphicon glyphicon-resize-horizontal"></span>
							<span class="label label-info">#14</span>&nbsp;(<small class="requerido">Tickets de ejemplo</small>)
						</div>

					</div>
				</div>
				<!--
	             <div class="list-group">
	                 <div class="list-group-item-full-header">
	                     <h6>MIS COINS</h6>
	                 </div>
	                 <div class="list-group-item">
	                     <img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px">
	                     <span id="" style="float:right;" class="label label-warning CantidadCoins">

	                     </span>
	                 </div>
	             </div>
	             <div class="list-group">
	                 <div class="list-group-item-full-header">
	                     <h6>MIS TICKETS</h6>
	                 </div>
	                 <div class="list-group-item">
	                     <img src="{!!URL::to('images/ticket.png')!!}" width="16px" height="16px">
	                     <span id="CantidadTickets" style="float:right;" class="label label-info">
	                     </span>
	                 </div>
	             </div>
						-->
			</div>
			<div class="col-md-8">

				<div class="list-group">
					<div class="list-group-item">
							Compra tus tickets a <span class="label label-warning">$ 100</span>
					</div>
					<div class="list-group-item">
						{!!Form::select('size', $cantidadtickets, null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control'])!!}
						<br>
						<button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-md comprar">Comprar ticket</button>
						<input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
						<input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
					</div>
				</div>


			</div>		


		</div>
	</div>
</div>
@stop
