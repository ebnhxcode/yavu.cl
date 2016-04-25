<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>		
		<div class="list-group-item">	
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Nombre:')!!}
				{!!Form::text('nombre_interes',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del interes'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Descripción:')!!}
				{!!Form::textarea('descripcion_interes',null,['class'=>'form-control','placeholder'=>'Ingrese descripcion del interes','rows' => '5'])!!}
			</div>			

		</div>
	</div>
</div>

<div class="col-sm-4">