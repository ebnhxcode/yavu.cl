<div id="SorteoListThumb">
	{!! $ImagenSorteo = ""; !!}
	<hr>

	@foreach($sorteos as $sorteo)
		<div class="row">
			<div class="col-md-4 col-xs-3">
					@if($sorteo->imagen_sorteo === "")
						<img class="img-responsive-centered" width="40%" src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
					@else
						<img class="img-responsive-centered" src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />
					@endif
			</div>
			<div class="col-md-6 col-xs-5">
				<h5><strong>Nombre Sorteo: </strong>{{$sorteo->nombre_sorteo}}</h5>
				<h5><strong>Descripción del Sorteo: </strong>{{$sorteo->descripcion}}</h5>
				<h5><strong>Estado del Sorteo: </strong>{{$sorteo->estado_sorteo}}</h5>
				@if(Auth::user()->check())
					<input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
					<input id="sorteo_id" value="{!! $sorteo->id !!}" type="hidden" />
					<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
					<br>
					<a id='participar' href="{!! URL::to('#!') !!}" class="btn btn-primary participar btn-sm" data-toggle="modal" data-target="#myModal" value="{!! $sorteo->id !!}" role="button">Participar</a>
					<a href="{!! URL::to('#!') !!}" class="btn btn-info btn-sm" role="button">Ver lista de premios!</a>
					<a href="{!! URL::to('#!') !!}" class="btn btn-info btn-sm" role="button">Ver lista de participantes!</a>
				@else
					<a href="{!! URL::to('usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Participar!</a>
				@endif
			</div>
			<div class="col-md-2 col-xs-4">
				<span class="glyphicon glyphicon-user">14</span>
				<br>
				<span class="glyphicon glyphicon-time">14</span>

			</div>
		</div>
		<hr>

	@endforeach
	@include('sorteos.forms.modalSorteo', array('sorteos' => $sorteos))
	{!!$sorteos->render()!!}

</div>
