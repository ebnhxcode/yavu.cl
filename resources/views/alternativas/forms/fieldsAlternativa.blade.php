<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">			
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Id Encuesta:')!!}
				{!!Form::text('encuesta_id',null,['class'=>'form-control','placeholder'=>'Ingrese el id de la encuesta'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Id Pregunta:')!!}
				{!!Form::text('pregunta_id',null,['class'=>'form-control','placeholder'=>'Ingrese el id de la pregunta'])!!}
			</div>			
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Alternativa:')!!}
				{!!Form::text('alternativa',null,['class'=>'form-control','placeholder'=>'Ingrese contenido de la alternativa'])!!}
			</div>		

		</div>
	</div>
</div>

<div class="col-sm-4">