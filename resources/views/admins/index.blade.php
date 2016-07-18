@section('favicon') {!!Html::favicon('favicons/admin.png')!!} @stop
@section('title') Admins @stop
@extends('layouts.frontadm')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-xs12-sm12-md12-lg12 -->

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div class="list-group">
					<div class="list-group-item">
						LISTA DE ADMINISTRADORES
					</div><!-- /div .list-group-item -->
					@foreach($admins as $admin)
						<div class="list-group-item">
							<span data-toggle="tooltip" data-placement="top" title="{!!$admin->email!!}">
								{!!$admin->nombre.' '.$admin->apellido!!}
							</span>
							{!!link_to_route('admins.edit', $title = 'Editar', $parameters = $admin->id, $attributes = ['class'=>'btn btn-primary btn-xs', 'style' => 'float:right;'])!!}
						</div><!-- /div .list-group-item -->
					@endforeach
				</div><!-- /div .list-group -->

				<div class="list-group">
					<div class="list-group-item">
						ESTAD&Iacute;STICAS R&Aacute;PIDAS
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Usuarios Registrados <b style="float:right;">{!! count($users) !!}</b>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Empresas Registradas <b style="float:right;">{!! count($companies) !!}</b>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Sorteos Activos <b style="float:right;">{!! count($raffles->where('estado_sorteo','Activo')) !!}</b>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Sorteos Finalizados <b style="float:right;">{!! count($raffles->where('estado_sorteo','Finalizado')) !!}</b>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Sorteos Pendientes de Aprovaci&oacute;n <b style="float:right;">{!! count($raffles->where('estado_sorteo','Pendiente')) !!}</b>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Publicaciones <b style="float:right;">{!! count($feeds) !!} <small>({!! count($feeds)*40 !!} coins)</small></b>
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->


				<div class="list-group">
					<div class="list-group-item">
						COINS Y TICKETS
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Econom&iacute;a de coins <b style="float:right;">{!! $coins->sum('cantidad') !!}</b>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						Econom&iacute;a de tickets <b style="float:right;">{!! $coins->sum('cantidad_tickets') !!}</b>
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- /div .col-xs12-sm12-md3-lg3 -->



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

