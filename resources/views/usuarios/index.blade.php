@section('favicon') {!!Html::favicon('favicons/user.png')!!} @stop
@section('title') Users @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-md12-sm12-xs12 -->
			<h2>Panel de administración</h2>
			<div class='panel panel-default'>
				<div class='panel-heading'><h4>Mantenedor de usuarios</h4></div>
				<div class='panel-body'>
					<div class='form-group'>
						{!!Form::text('usuario',null,['class'=>'form-control','placeholder'=>'buscar...','id'=>'usuario'])!!}
					</div><!-- /div .form-group -->
					<div class='wrap'>
						<table id='UserList' class='table table-hover'>
							<thead>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Ciudad</th>
							<th>Fono</th>
							<th>Cumplea&ntilde;os</th>
							<th>Sexo</th>
							<th>Operaciones</th>
							</thead>
							@foreach($users as $user)
								<tbody>
								<td>{!!$user->nombre!!}</td>
								<td>{!!$user->email!!}</td>
								<td>{!!$user->ciudad!!}</td>
								<td>{!!$user->fono!!}</td>
								<td>{!!$user->fecha_nacimiento!!}</td>
								<td>{!!$user->sexo!!}</td>
								<td><a class='btn btn-primary' href='{!! route('usuarios_edit_path', $user->id) !!}'>Editar</a></td>
								</tbody>
							@endforeach
						</table><!-- /div #UserList .table .table-hover -->
					</div><!-- div .wrap -->
				</div><!-- /div .panel-body -->
			</div><!-- /div .panel-default -->
			{!!$users->render()!!}
		</div><!-- /div .row -->
	</div><!-- /div .contentMiddle -->
</div><!-- /div .jumbotron -->
@stop