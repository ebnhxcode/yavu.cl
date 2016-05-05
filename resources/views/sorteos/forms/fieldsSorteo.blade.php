<div class="col-md-8 col-sm-12 col-xs-12">
	<div class="list-group" >
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

			<div class="form-group has-feedback has-feedback-left">
				(<strong><small><span class="requerido">Requerido</span></small></strong>)
				{!!Form::label('Imagen sorteo:')!!}
				{!!Form::file('imagen_sorteo', ['class' => 'btn', 'id' => 'ImagenSorteo'])!!}
			</div>

{{--
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Estado Sorteo:')!!}
				{!!Form::select('estado_sorteo',
					[0 => 'Pendiente (No visible en sorteos)',
					1 => 'Lanzado (Terminar)'],
					$selected = null, ['class' => 'form-control'])
				!!}
			</div>
--}}

			@if (Auth::user()->check() && isset($empresa_id))
				<input type="hidden" name="user_id" value="{!! Auth::user()->get()->id !!}">
				<input type="hidden" name="empresa_id" value="{!! $empresa_id !!}">
				<input type="hidden" name="nombre_empresa" value="{!! $nombre_empresa !!}">
			@endif
		</div><!-- /div list group item -->
	</div><!-- list-group -->
</div><!-- div col-md-8 -->
