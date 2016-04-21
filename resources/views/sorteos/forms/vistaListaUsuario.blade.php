<div id="SorteoListThumb">
	{!! $ImagenSorteo = "" !!}

	@foreach($sorteos as $sorteo)
		<div class="row">

			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="thumbnail">
					@if($sorteo->imagen_sorteo == "")
						<img class="img-responsive-centered" width="40%" src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
					@else
						<img class="img-responsive-centered" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />
					@endif

					<div class="amplio">
						<div style="padding-left: 8px;padding-right: 8px;" class="row">

							<div align="center" class="col-md-3 col-sm-3 col-xs-3">
								<span class="glyphicon glyphicon-user"></span>
								<span class="TicketsEnSorteo" id="{!! $sorteo->id !!}"></span>
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							</div>

							<div align="center" class="col-md-3 col-sm-3 col-xs-3">
								<span class="glyphicon glyphicon-tag"></span>
								<span class="MisTicketsUsados" id="{!! $sorteo->id !!}"></span>
							</div>

							<div align="center" class="col-md-6 col-sm-6 col-xs-6">
								<span class="glyphicon glyphicon-time"></span>
								<span class="" id="{!! $sorteo->id !!}">00:00:00</span>
							</div>

						</div>
					</div>

					<div class="row">
						<div align="center" class="col-md-3 col-sm-3 col-xs-3">
							<small>Tickets en juego</small>
						</div>

						<div align="center" class="col-md-3 col-sm-3 col-xs-3">
							<small>Tickets apostados</small>
						</div>

						<div align="center" class="col-md-6 col-sm-6 col-xs-6">
							<small>Tiempo restante</small>
						</div>
					</div>

					<div class="semi-amplio">
						<button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button"   style="display: none; width: 100%;" data-dismiss="modal">Participar / Usar ticket</button>
					</div>

					<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
							<span class="sr-only"></span>
							<span class="seconds">Actualizando...</span>
						</div>
					</div>

				</div>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-3">
				<h5><strong>Nombre Sorteo: </strong>{!!$sorteo->nombre_sorteo!!}</h5>
				<h5><strong>Descripción del Sorteo: </strong>{!!$sorteo->descripcion!!}</h5>
				<h5><strong>Estado del Sorteo: </strong><span class="requerido">{!!$sorteo->estado_sorteo!!}</span></h5>
				<h5><strong>Fecha del sorteo: </strong>{!!$sorteo->fecha_inicio_sorteo!!}</h5>
				@if(Auth::user()->check())
					<input id="sorteo_id" value="{!! $sorteo->id !!}" type="hidden" />
					<input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
					<br>
					<!--
					<a id='participar' href="{!! URL::to('#!') !!}" class="btn btn-primary participar btn-sm" data-toggle="modal" data-target="#myModal" value="{!! $sorteo->id !!}" role="button">Comprar</a>
					-->
					{!!link_to_route('sorteos.show', $title = 'Detalles', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}

				@else
					<a href="{!! URL::to('usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Participar!</a>
				@endif
			</div>
			<div class="col-md-4 col-sm-4 col-xs-3">

			</div>
		</div>
		<hr>
	@endforeach
	{!!$sorteos->render()!!}

</div>
