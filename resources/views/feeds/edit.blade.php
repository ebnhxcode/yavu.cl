@section('title') Edit feed @stop
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
		</div><!-- /div de titulo -->

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				@include('alerts.allAlerts')
			</div>


			{!!Form::model($feed, ['method'=>'PUT', 'route' => ['feeds.update', $feed->id] ])!!}
				<div class="col-md-8">
					@include('feeds.forms.fieldsFeed')
				</div>

				<div class="col-md-4">

					<div class="list-group">
						<div class="list-group-item">
							<div class="form-group has-feedback has-feedback-left">
								{!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
								<br>
								{!!Form::close()!!}
							</div>
						</div><!-- /list-group-item -->
						<div class="list-group-item">
							<div class="form-group has-feedback has-feedback-left">
								{!!Form::open(['action'=> ['FeedController@destroy', $feed->id], 'method'=>'DELETE'])!!}
								{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
								{!!Form::close()!!}
							</div>
						</div><!-- /list-group-item -->
					</div><!-- /list-group -->
				</div>



			</div><!-- /row -->
		</div><!-- /contentMiddle -->
	</div><!-- /jumbotron -->
@stop