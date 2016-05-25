@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<div style="font-size: 3em;">
			<img width="64px" style="padding-bottom: 20px;" src= "{!!URL::to('img/newGraphics/neo_icono_publicaciones.png')!!}" />
			<span>
				<a href="{!! URL::to('/feeds') !!}">Publicaciones</a>
				<span class="requerido">\</span>
					Editar
			</span>
		</div>

		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		@include('alerts.infoMessage')
		<div class="row">
			{!!Form::model($feed, ['method'=>'PUT', 'route' => ['feeds.update', $feed->id] ])!!}
			@include('feeds.forms.fieldsFeed')
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
							{!!Form::open(['action'=> ['FeedController@destroy', $feed->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
							{!!Form::close()!!}													
						</div>	
					</div>		
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsUser-->	
		</div>
	</div>
</div>
@stop