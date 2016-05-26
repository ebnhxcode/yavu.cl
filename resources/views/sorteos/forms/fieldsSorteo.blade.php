

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
				{!!Form::label('Fecha a realizar el Sorteo:')!!}
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
				{!!Form::file('imagen_sorteo', ['class' => 'btn', 'id' => 'ImagenSorteo', 'size' => '2048'])!!}
			</div>

{{--
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Estado Sorteo:')!!}
				{!!Form::select('estado_sorteo',
					[0 => 'Pendiente (No visible en sorteos)',
					1 => 'Activo (Terminar)'],
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



<script>

	$('#ImagenSorteo').change(function(){
		var formato = this.value;
		var formatosPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
		formato = formato.split('.');
		var sizeByte = this.files[0].size;
     	var siezekiloByte = parseInt(sizeByte / 1024);
		if((formatosPermitidos.indexOf(formato[1]) < 0) || (siezekiloByte > $(this).attr('size')))

		{	

			alert('Formato de imagen invalido o tamaño supera 1 Mega, no se subirá');
			this.value = '';
		}
		else
		{
			$('#Sorteo').addClass('btn btn-success btn-xs').text('ok');
		}
	});

</script>
