@section('favicon') {!!Html::favicon('favicons/admin.png')!!} @stop
@section('title') Admins @stop
@extends('layouts.frontadm')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
				<!--
				<div class="" style="font-size: 3em;">
					<img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n Yavü</a></span>
				</div>
				-->
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="list-group">
					<div class="list-group-item">
						<h3>Lista de administradores</h3>
					</div>
					<div class="list-group-item">
						<div class="wrap">
							<table class="table">
								<thead>
								<th>ID</th>
								<th>Nombre</th>
								<th>Correo</th>
								<th>Operaciones</th>
								</thead>
								@foreach($admins as $admin)
									<tbody>
									<td>{!!$admin->id!!}</td>
									<td>{!!$admin->nombre.' '.$admin->apellido!!}</td>
									<td>{!!$admin->email!!}</td>
									<td>{!!link_to_route('admins.edit', $title = 'Editar', $parameters = $admin->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}</td>
									</tbody>
								@endforeach
							</table>
							{!!$admins->render()!!}
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="list-group">
					<div class="list-group-item">
						<h3>Informaci&oacute;n b&aacute;sica de entrada</h3>
					</div>
					<div class="list-group-item">

					</div>
				</div>

				<div class="list-group">
					<div class="list-group-item">
						<h3>Accesos rápidos</h3>
					</div>
					<div class="list-group-item">
						<a href="{!! URL::to('/admins/create') !!}">Crear administrador</a>
					</div>
					<div class="list-group-item">
						<a href="{!! URL::to('/sorteospendientes') !!}">Confirmar sorteos</a>
					</div>
					<div class="list-group-item">
						<a href="{!! URL::to('/admins/empresas/index') !!}">Listar empresas</a>
					</div>
					<div class="list-group-item">
						<a href="{!! URL::to('/admins/banneradmin/') !!}">Listar empresas con banner</a>
					</div>
					<div class="list-group-item">
						<a href="{!! URL::to('/admins/empresas/create') !!}">Pre-Crear empresa</a>
					</div>
					<div class="list-group-item">
						<a href="{!! URL::to('#!') !!}"></a>
					</div>
				</div><!-- /div list-group -->
			</div><!-- /div col-md-6-sm-6-xs-12 -->
		</div><!-- /div row -->
	</div><!-- /div contentMiddle -->
</div><!-- /div jumbotron -->


@stop

