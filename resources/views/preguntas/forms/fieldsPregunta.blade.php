<div class="list-group" >
	<div class="list-group-item">
		<h4>Datos principales</h4>
	</div><!-- /div .list-group-item -->
	<div class="list-group-item">
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::label('Id Encuesta:')!!}
			{!!Form::text('encuesta_id',null,['class'=>'form-control','placeholder'=>'Ingrese el id de la encuesta_id'])!!}
		</div><!-- /div .form-group .has-feedback .has-feedback-left -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::label('Pregunta:')!!}
			{!!Form::text('pregunta',null,['class'=>'form-control','placeholder'=>'Ingrese el titulo de la pregunta'])!!}
		</div><!-- /div .form-group .has-feedback .has-feedback-left -->
	</div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->
