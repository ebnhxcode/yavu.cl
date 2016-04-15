<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
			<div class="form-group has-feedback has-feedback-left">
				(<strong><small><span class="requerido">Requerido</span></small></strong>)
				{!!Form::label('Nombre del sorteo:')!!}
				{!!Form::text('nombre_sorteo',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del Sorteo'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				(<strong><small><span class="requerido">Requerido</span></small></strong>)
				{!!Form::label('Descripción:')!!}
				{!!Form::textarea('descripcion',null,['class'=>'form-control','maxlength'=>'500','placeholder'=>'Ingrese la descripcion del sorteo'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				(<strong><small><span class="requerido">Requerido</span></small></strong>)
				{!!Form::label('Fecha de inicio Sorteo:')!!}
				{!!Form::text('fecha_inicio_sorteo',null,['class'=>'form-control','placeholder'=>'','id'=>'datepicker'])!!}
				<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
				<script src="//code.jquery.com/jquery-1.10.2.js"></script>
				<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				<script>
					$(function() {
						$( "#datepicker" ).datepicker();
					});
				</script>




			</div>
			<div class="form-group has-feedback has-feedback-left">
					{!!Form::hidden('estado_sorteo', 'Pendiente')!!}
			</div>

				<div class="list-group-item">
					<div class="form-group has-feedback has-feedback-left">

						{!!Form::label('Imagen sorteo:')!!}<br>
						{!!Form::file('imagen_sorteo', ['class' => 'btn'])!!}
						<br>
					</div>
				</div>			
			@if (Auth::admin()->check())
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Estado Sorteo:')!!}
					{!!Form::select('estado_sorteo',
						['Pendiente' => 'Pendiente',
						'Aprobado' => 'Aprobado'],
						$selected = null, ['class' => 'form-control'])
					!!}
				</div>
			@endif
			@if (Auth::user()->check())
				<input type="hidden" name="user_id" value="{!! Auth::user()->get()->id !!}">
			@endif
		</div>
	</div>
</div>
