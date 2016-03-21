@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		<h4>Registro de Coins</h4>
		<div class="row">
			{!!Form::open(['route'=>'coins.store', 'method'=>'POST'])!!}
			@include('coins.forms.fieldsCoins')


				<div class="col-sm-4">
					<div class="list-group">					
						<div class="list-group-item">			
							<h4>Todos los campos son requeridos</h4>
						</div>
						<div class="list-group-item">
							<div class="form-group has-feedback has-feedback-left">	
								{!!Form::label('Registrar')!!}		
								{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;'])!!}
								{!!Form::close()!!}			
							</div>
						</div>
					</div>	
				</div>

			</div><!--Este fin del div cierra el div que se abre en fieldsEmpresa-->			
		</div>
	</div>
</div>
@stop