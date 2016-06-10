<div class="list-group" >
	<div class="list-group-item">
		<h4>Datos principales</h4>
	</div><!-- /div .list-group-item -->
	<div class="list-group-item">
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::label('Id Usuario:')!!}
			{!!Form::number('user_id',null,['class'=>'form-control','placeholder'=>'Ingrese el id de usuario'])!!}
		</div><!-- /div .form-group .has-feedback .has-feedback-left -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::label('Descripción:')!!}
			{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese descripcion del pago','rows' => '5'])!!}
		</div><!-- /div .form-group .has-feedback .has-feedback-left -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::label('Monto:')!!}
			{!!Form::number('monto',null,['class'=>'form-control','placeholder'=>'Ingrese el monto'])!!}
		</div><!-- /div .form-group .has-feedback .has-feedback-left -->
	</div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->
