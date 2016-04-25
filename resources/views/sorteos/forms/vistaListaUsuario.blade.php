<div id="SorteoListThumb">
	{!! $ImagenSorteo = "" !!}



	<script src="js/helpers/jquery.simple.timer.js"></script>
	<div class="">
		<div class="progress">
			<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
				<span class="sr-only"></span>
				<span>cargando sorteos</span>
			</div>
		</div>
	</div>
	@foreach($sorteos as $sorteo)
		@if($sorteo->estado_sorteo == 'Lanzado')
			<div class="row">

				<div class="col-md-8 col-sm-12 col-xs-12">
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
									<div class="timer" data-seconds-left="{!! $sorteo->created_at !!}" style="float: right;"></div>
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
								<br>
								<small><span id="estado"></span></small>
							</div>
						</div>
						<div class="semi-amplio">
							<button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button"   style="display: none; width: 100%;" data-dismiss="modal">Participar</button>
						</div>

					</div>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">

					<div class="">
						<h5>
							<strong>Nombre Sorteo: </strong>
							<input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->nombre_sorteo!!}">
						</h5>
						<h5>
							<strong>Descripción del Sorteo: </strong>
							<textarea disabled class="form-control">{!!$sorteo->descripcion!!}</textarea>
						</h5>
						<h5>
							<strong>Estado del Sorteo: </strong>
							<span class="requerido"></span>
							<input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->estado_sorteo!!}">
						</h5>
						<h5>
							<strong>Fecha del sorteo: </strong>
							<input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->fecha_inicio_sorteo!!}">
						</h5>
						@if(Auth::user()->check())
							<input id="sorteo_id" value="{!! $sorteo->id !!}" type="hidden" />
							<input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
							<!--
						<a id='participar' href="{!! URL::to('#!') !!}" class="btn btn-primary participar btn-sm" data-toggle="modal" data-target="#myModal" value="{!! $sorteo->id !!}" role="button">Comprar</a>
						-->
							<div class="btn-group" role="group" aria-label="...">




							</div>

							<div class="dropup">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Menu
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

									<li>{!!link_to_route('sorteos.show', $title = 'Ver mas detalles', $parameters = $sorteo->id, $attributes = [])!!}</li>
									@if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Pendiente')
										<li role="separator" class="divider"></li>
										<li><a href="{!! URL::to('sorteos/'.$sorteo->id.'/edit') !!}">Editar</a></li>
										<li>{!!link_to_route('sorteos.show', $title = 'Ir a sortear', $parameters = $sorteo->id, $attributes = [])!!}</li>
									@endif
								</ul>
							</div>


						@else
							<a href="{!! URL::to('usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Participar!</a>
						@endif
					</div>

				</div>
			</div>
			<hr>
		@endif
	@endforeach
	{!!$sorteos->render()!!}

</div>
