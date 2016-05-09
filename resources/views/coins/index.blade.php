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
		<div class="" style="font-size: 3em;">
			<img id="img" width="8%" src= "{!!URL::to('img/newGraphics/yavucoin_neo03b.png')!!}"/><span >Coins <span class="requerido">\</span> Historial</span>
		</div>
		<div class="row">

			<div class="col-sm-4"><!--style="position:fixed;z-index:1000;"-->

				<div>
					<div>

						<div class="list-group">
							<div class="list-group-item list-group-item-success">
								INFORMACIÓN
							</div>
							<div class="list-group-item">
								Coins
								<span id="" style="float:right;" class="label label-warning CantidadCoins">
									 <img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px">
								</span>
							</div>
							@include('miniDashboard.miniDashboard')
						</div>
					</div>
				</div>

			</div>

			<div class="col-md-8">
				<div class="list-group">
					<div class="list-group-item list-group-item-success">
						HISTORIAL DE USO DE COINS
					</div>
					<div class="list-group-item wrap">
						<table id="UserList" class="table table-hover" style="font-size: 0.8em;">
							<thead>
								<th>Motivo</th>
								<th>Cantidad</th>
								<th>Fecha</th>
							@if(Auth::admin()->check())
								<th>Operaciones</th>
							@endif
							</thead>
						@foreach($historialcoins as $hcoin)	
							<tbody>
								<td>{!!$hcoin->motivo!!}</td>
								<td>{!!$hcoin->cantidad!!}</td>
								<td>
									<abbr class="timeago" id="date{!!$hcoin->id!!}" title="{!!$hcoin->created_at!!}"></abbr>
								</td>
							@if(Auth::admin()->check())
								<td>
									{!!link_to_route('coins.edit', $title = 'Editar', $parameters = $hcoin->id, $attributes = ['class'=>'', 'style' => 'color:#000;'])!!}
								</td>
							@endif
							</tbody>
						@endforeach
						</table>	
					</div>
					{{--<a class="list-group-item list-group-item-info" href="#!"><small>CARGAR MÁS</small></a>--}}
				</div>				
			</div>			



		</div>
	</div>
</div>
@stop
<script>
	$(function(){
		setInterval(function(){
			$("abbr.timeago").timeago();
			Refresh = 30000 + Refresh;
		}, Refresh);
		return true;
	});
</script>