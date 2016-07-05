@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!! $categoria->nombre_categoria !!} @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-lg12-md12-sm12-xs12 -->

			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				@include('categorias.indexPartial.sectionLeft')
			</div><!-- /div .col-lg3-md3-sm3-xs12 -->

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="list-group">
					{!!Form::model($categoria, ['method'=>'PUT', 'route' => ['categorias.update', $categoria->id] ])!!}
					@include('categorias.forms.fieldsCategoria')
					<div class="list-group-item">
						{!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
					</div><!-- /div .list-group-item -->
					{!!Form::close()!!}
					<div class="list-group-item">
						{!!Form::open(['action'=> ['CategoriaController@destroy', $categoria->id], 'method'=>'DELETE'])!!}
						{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
						{!!Form::close()!!}
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->


			</div><!-- /div .col-lg6-md6-sm6-xs12 -->

			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				@include('categorias.indexPartial.sectionRight')
			</div><!-- /div .col-lg3-md3-sm3-xs12 -->

		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop