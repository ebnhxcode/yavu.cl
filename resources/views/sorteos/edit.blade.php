@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		<div class="" style="font-size: 3em;">
			<img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span >Sorteos <span class="requerido">\</span> Editar</span>
		</div>
		<div class="row">

			{!!Form::model($sorteo, ['method'=>'PUT', 'route' => ['sorteos.update', $sorteo->id], 'files' => true ])!!}
			@include('sorteos.forms.fieldsSorteo', array('sorteo' => $sorteo))

			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="list-group">
					<div class="list-group-item">
						<h4>Todos los campos son requeridos</h4>
					</div>
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">

							{!!Form::submit('Guardar', ['class'=>'btn btn-success btn-md', 'style'=>'width:100%;'])!!}
							{!!Form::close()!!}

							{{--
							{!!Form::open(['action'=> ['SorteoController@destroy', $sorteo->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-danger', 'style'=>'width:100%;']) !!}﻿
							{!!Form::close()!!}
							--}}
						</div>
					</div> <!-- /div list-gruop item -->
				</div> <!-- /div list-group -->
			</div> <!-- /div col-md-4 col-sm-12 col-xs-12 -->

		</div> <!-- /div row -->
	</div> <!-- /div contentMiddle -->
</div> <!-- /div jumbotron -->
@stop