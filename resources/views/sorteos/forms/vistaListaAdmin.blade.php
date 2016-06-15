<table class="table table-hover" id="SorteoList">
	<thead>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Estado Sorteo</th>
	</thead>
	@foreach($sorteos as $sorteo)
		<tbody>
			<td>{!!$sorteo->nombre_sorteo!!}</td>
			<td>{!!$sorteo->descripcion!!}</td>
			<td>{!!$sorteo->estado_sorteo!!}</td>
			<td>{!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		</tbody>
	@endforeach
</table><!-- /div #SorteoList .table .table-hover -->
{!! $sorteos->render() !!}