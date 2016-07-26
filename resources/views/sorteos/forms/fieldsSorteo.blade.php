<div class="list-group" >
	<div class="list-group-item">
		<small>VAMOS A CREAR UN NUEVO SORTEO</small>
	</div><!-- /div .list-group-item -->
	<div class="list-group-item">
    <span class="softText-descriptions">
      Escriba un nombre para este sorteo
    </span><!-- /span .softText-descriptions -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::text('nombre_sorteo',null,['class'=>'form-control input-sm','placeholder'=>'Ingrese el nombre del Sorteo'])!!}
		</div><!-- /div .form-group .has-feedback ..has-feedback-left -->

    <span class="softText-descriptions">
      Escriba una descripci&oacute;n para este sorteo
    </span><!-- /span .softText-descriptions -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::textarea('descripcion',null,['class'=>'form-control input-sm','maxlength'=>'500','rows'=>'3','placeholder'=>'Ingrese la descripcion del sorteo'])!!}
		</div><!-- /div .form-group .has-feedback ..has-feedback-left -->

    <span class="softText-descriptions">
      Seleccione una fecha para realizar el sorteo
    </span><!-- /span .softText-descriptions -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::text('fecha_inicio_sorteo',null,['class'=>'form-control','placeholder'=>'','id'=>'datepicker'])!!}
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script>
				$(function() {
					$( "#datepicker" ).datepicker();
				});
			</script>
		</div><!-- /div .form-group .has-feedback ..has-feedback-left -->

		<div class="form-group has-feedback has-feedback-left">
			{!!Form::hidden('estado_sorteo', 'Pendiente')!!}
		</div><!-- /div .form-group .has-feedback ..has-feedback-left -->

    <span class="softText-descriptions">
      Busque una imagen para destacar su sorteo
    </span><!-- /span .softText-descriptions -->
		<div class="form-group has-feedback has-feedback-left">
			{!!Form::file('imagen_sorteo', ['class' => 'btn', 'id' => 'ImagenSorteo', 'size' => '2048'])!!}
		</div><!-- /div .form-group .has-feedback ..has-feedback-left -->

		@if (Auth::user()->check() && isset($empresa_id))
			<input type="hidden" name="user_id" value="{!! Auth::user()->get()->id !!}">
			<input type="hidden" name="empresa_id" value="{!! $empresa_id !!}">
			<input type="hidden" name="nombre_empresa" value="{!! $nombre_empresa !!}">
		@endif
	</div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->
<script>
	$('#ImagenSorteo').change(function(){
		var formato = this.value;
		var formatosPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
		formato = formato.split('.');
		var sizeByte = this.files[0].size;
     	var siezekiloByte = parseInt(sizeByte / 1024);
		if((formatosPermitidos.indexOf(formato[1]) < 0) || (siezekiloByte > $(this).attr('size'))){
			alert('Formato de imagen invalido o tamaño supera 1 Mega, no se subirá');
			this.value = '';
		}else{
			$('#Sorteo').addClass('btn btn-success btn-xs').text('ok');
		}
	});
</script><!-- /script for accion with #ImagenSorteo  -->
