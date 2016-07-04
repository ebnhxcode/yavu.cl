@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!! $categoria->nombre_categoria !!} @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<!--<h4>Edición de categorias</h4>-->
		@include('alerts.allAlerts')
		<div class="row">
			{!!Form::model($categoria, ['method'=>'PUT', 'route' => ['categorias.update', $categoria->id] ])!!}
			@include('categorias.forms.fieldsCategoria')
				<div class="list-group">
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
							<br>
							{!!Form::close()!!}				
						</div>
					</div>
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::open(['action'=> ['CategoriaController@destroy', $categoria->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
							{!!Form::close()!!}
						</div><!-- /div .form-group .has-feedback .has-feedback-left -->
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- /div .row -->
		</div><!-- /div #contentMiddle -->
	</div>
</div>
@stop