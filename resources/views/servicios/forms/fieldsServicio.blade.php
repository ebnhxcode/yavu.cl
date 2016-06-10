<div class="list-group">
	<div class="list-group-item">
		<h4>Datos principales</h4>
	</div><!-- /div .list-group-item -->
	<div class="list-group-item">
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del servicio'])!!}
		</div><!-- /div .form-group .has-feedback .has-feedback-left -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::label('Descripción:')!!}
			{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese descripcion del servicio','rows' => '5'])!!}
		</div><!-- /div .form-group .has-feedback .has-feedback-left -->
	</div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->

