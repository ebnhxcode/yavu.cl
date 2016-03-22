@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		<h1>Registro de Empresas</h1>
		<div class="row">
			{!!Form::open(['route'=>'empresas.store', 'method'=>'POST', 'files' => true, 'id' => 'FormEmpresa' ])!!}
			@include('empresas.forms.fieldsEmpresa')
				<div class="list-group">
					<div class="list-group-item">			
						<div class="form-group has-feedback has-feedback-left">	
							{!!Form::submit('Registrar', ['class'=>'btn btn-success', 'style'=>'width:100%;'])!!}
							{!!Form::close()!!}			
						</div>
					</div>
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsEmpresa-->			
		</div>
	</div>
</div>
@stop