@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Categories @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-lg12-md12-sm12-xs12 -->

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!--<h2>Panel de administración</h2>-->
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Mantenedor de categoria</h4></div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<th>Nombre categoria</th>
								<th>Tipo Categoria</th>
							</thead>
							@foreach($categorias as $categoria)
								<tbody>
									<td>{!!$categoria->nombre_categoria!!}</td>
									<td>{!!$categoria->tipo_categoria!!}</td>
									<td>{!!link_to_route('categorias.edit', $title = 'Editar', $parameters = $categoria->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
								</tbody>
							@endforeach

						</table><!-- /table .table -->
					</div><!-- /div .panel-body -->
				</div><!-- /div .panel .panel-default -->
			</div><!-- /div .col-lg12-md12-sm12-xs12 -->

		</div><!-- /div .row -->

	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop