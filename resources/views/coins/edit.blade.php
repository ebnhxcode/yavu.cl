@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')	
		<div class="row">
			{!!Form::model($coin, ['method'=>'PUT', 'route' => ['coins.update', $coin->id] ])!!}
			@include('coins.forms.fieldsCoins')



			<div class="col-sm-4">
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
							{!!Form::open(['action'=> ['CoinController@destroy', $coin->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar carga', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
							{!!Form::close()!!}													
						</div>	
					</div>

				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldscoin-->	
		</div>
	</div>
</div>
@stop