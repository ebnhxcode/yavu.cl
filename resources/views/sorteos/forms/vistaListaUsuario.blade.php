<div id="SorteoListThumb">
	{!! $ImagenSorteo = "" !!}

	<div>
		<div class="progress">
			<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
				<span class="sr-only"></span>
				<span>cargando sorteos</span>
			</div>
		</div><!-- /progress bar -->
	</div><!-- /div -->
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
									<abbr title="{!! $sorteo->fecha_inicio_sorteo !!}">21:00:00 hrs</abbr>
								</div>

							</div> <!-- /div row -->
						</div><!-- /div amplio -->

						<div class="row">
							<div align="center" class="col-md-3 col-sm-3 col-xs-3">
								<small>Tickets en juego</small>
							</div>

							<div align="center" class="col-md-3 col-sm-3 col-xs-3">
								<small>Tickets apostados</small>
							</div>

							<div align="center" class="col-md-6 col-sm-6 col-xs-6">
								<small>Recuerda</small>
								<br>
								<small><span id="estado"></span></small>
							</div>
						</div><!-- /div row -->

						<div class="semi-amplio">
							<button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button"   style="display: none; width: 100%;" data-dismiss="modal">Participar</button>
						</div>

					</div> <!-- /thumbnail -->
				</div> <!-- /col-md-8 col-sm-12 col-xs-12 -->

				<div class="col-md-4 col-sm-12 col-xs-12">
					<strong>Empresa: </strong>
					<div class="well well-sm">
						<a href="{!! URL::to('/empresa/'.$sorteo->nombre_empresa) !!}">{!! $sorteo->nombre_empresa !!}</a>
					</div>

					<div>
						<h5>
							<strong>Nombre Sorteo: </strong>
							<strong><input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->nombre_sorteo!!}"></strong>
						</h5>
						<h5>
							<strong>Descripción del Sorteo: </strong>
							<strong><textarea disabled class="form-control">{!!$sorteo->descripcion!!}</textarea></strong>
						</h5>
						<h5>
							<strong>Estado del Sorteo: </strong>
							<span class="requerido"></span>
							<strong><input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->estado_sorteo!!}"></strong>
						</h5>
						<h5>
							<strong>Fecha del sorteo: </strong>
							<strong><input class="form-control" type="text" disabled="disabled" value="{!!$sorteo->fecha_inicio_sorteo!!}"></strong>
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
									<span class="glyphicon glyphicon-cog"></span>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
									<li><a href="{!! URL::to('empresa/'.$sorteo->nombre_empresa.'/sorteos') !!}">Ver m&aacute;s sorteos de {!! $sorteo->nombre_empresa !!}</a></li>
									<li>{!!link_to_route('sorteos.show', $title = 'Ver mas detalles', $parameters = $sorteo->id, $attributes = [])!!}</li>
									@if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Lanzado')
										<li role="separator" class="divider"></li>
										<li>{!!link_to_route('sorteos.show', $title = 'Ir a sortear', $parameters = $sorteo->id, $attributes = [])!!}</li>
                  @elseif($sorteo->estado_sorteo == 'Pendiente')
                    <li><a href="{!! URL::to('sorteos/'.$sorteo->id.'/edit') !!}">Editar</a></li>
									@endif
								</ul>
							</div><!-- /dropup button menu -->
							<br>

							<div id="msjs{!! $sorteo->id !!}" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

						@else
							<a href="{!! URL::to('usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Participar!</a>
						@endif
					</div>

				</div> <!-- /div col-md-4 col-sm-12 col-xs-12 -->
			</div><!-- /div row -->
			<hr>
		@endif
	@endforeach
	{!!$sorteos->render()!!}
</div>
