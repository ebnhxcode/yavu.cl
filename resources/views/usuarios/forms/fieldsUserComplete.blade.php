
	<div class="container">

    <!-- Información básica -->
			{{--@include('usuarios.forms.fieldsUserCompletePartial.basicFields')--}}
    <!-- End Información básica -->




    @if (!Auth::user()->check())
      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::hidden('tipo_usuario', 'Usuario')!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::hidden('estado', 'Activo')!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      @endif

		<!-- GESTION DE LAS FOTOS -->
		<div class=''>
			<div class='form-group has-feedback has-feedback-left'>
				(Solo jpg, png) {!!Form::label('Imagen de perfil:')!!}<span id='Perfil'></span><br>
				<span class=''>

          <label class="btn btn-default btn-sm btn-file">
            <span class="glyphicon glyphicon-camera "></span>
            Buscar imagen ... <input type="file" name="imagen_perfil" style="display: none;" id="imagen_perfil" maxlength="255" size="2048">
          </label><!-- /label .btn .btn-default .btn-sm .btn-file -->

				</span><!-- /span .btn-file .btn-md -->
        <a class="thumbnail" href="">
          <img width='' id='ImagenPerfil' class='img-responsive-centered' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'usuario_nuevo.png' !!}'>
        </a>


			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			<div class='form-group has-feedback has-feedback-left'>
        <small>(Solo jpg, png)</small> {!!Form::label('Imagen de portada:')!!}<span id='Portada'></span><br>
				<span class=''>

          <label class="btn btn-default btn-sm btn-file">
            <span class="glyphicon glyphicon-camera "></span>
            Buscar imagen ... <input type="file" name="imagen_portada" style="display: none;" id="imagen_portada" maxlength="255" size="2048">
          </label><!-- /label .btn .btn-default .btn-sm .btn-file -->

				</span>
        <a class="thumbnail" href="">
          <img width='' id='ImagenPortada' class='img-responsive-centered' src='/img/users/{!! isset($user)?($user->imagen_portada!='')?$user->imagen_portada:'banner.png':'banner.png' !!}'>
        </a>
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
		</div><!-- /div .list-group-item -->
	</div><!-- /div .list-group -->
</div><!-- /div .col-md8-sm8-xs12 -->


	@if(Auth::user()->check() or Auth::admin()->check())
		<div class='list-group' >
			<div class='list-group-item list-group-item-success'>
				DATOS DE CONTACTO
			</div><!-- /div .list-group-item .success -->
			<div class='list-group-item'>
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Rut:')!!}
					{!!Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese su rut', 'id' => 'rut', 'maxlength' => '16'])!!}
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Nickname:')!!}
					{!!Form::text('login',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre de usuario', 'maxlength' => '100'])!!}			
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Dirección:')!!}
					{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese dirección', 'maxlength' => '100'])!!}
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Región:')!!}
					{!!Form::select('region', 
						['I Región' => 'I Región',
						'II Región' => 'II Región',	
						'III Región' => 'III Región',	
						'IV Región' => 'IV Región',
						'V Región' => 'V Región',
						'VI Región' => 'VI Región',
						'VII Región' => 'VII Región',
						'VIII Región' => 'VIII Región',
						'IX Región' => 'IX Región',
						'X Región' => 'X Región',
						'XI Región' => 'XI Región',
						'XII Región' => 'XII Región',
						'XIII Región' => 'XIII Región',
						'XVI Región' => 'XVI Región',
						'XV Región' => 'XV Región'],
						$selected = null, ['class' => 'form-control', 'maxlength' => '100']) 
					!!}			
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('País:')!!}
					{!!Form::select('pais',
						['Chile' => 'Chile',	 
						'Argentina' => 'Argentina',
						'Bolivia' => 'Bolivia',	
						'Brasil' => 'Brasil',	
						'Colombia' => 'Colombia',	
						'Ecuador' => 'Ecuador',	
						'Mexico' => 'Mexico',	
						'Panama' => 'Panama',	
						'Paraguay' => 'Paraguay',	
						'Venezuela' => 'Venezuela',	
						'Uruguay' => 'Uruguay',	
						'Otro' => 'Otro'], 
						$selected = null, ['class' => 'form-control', 'maxlength' => '100']) 
					!!}	
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Teléfono Movil:')!!}
					{!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '16'])!!}
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Teléfono Fijo:')!!}
					{!!Form::text('fono_2',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '16'])!!}
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Sexo:')!!}
					{!!Form::select('sexo', 
						['Masculino' => 'Masculino',
						'Femenino' => 'Femenino',	
						'Otro' => 'Otro'], 
						$selected = null, ['class' => 'form-control', 'maxlength' => '10']) 
					!!}		
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::label('Cumpleaños:')!!}
					{!!Form::date('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '100'])!!}
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->

				@if (Auth::admin()->check()||Auth::user()->check())
					<div class='form-group has-feedback has-feedback-left'>
						{!!Form::hidden('estado', 'Activo', ['maxlength' => '100'])!!}	
					</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
					@if (Auth::admin()->check())
						<div class='form-group has-feedback has-feedback-left'>
							{!!Form::label('Tipo usuario:')!!}
							{!!Form::select('tipo_usuario', 
								['Usuario' => 'Usuario',
								'Cliente' => 'Cliente'], 
								$selected = null, ['class' => 'form-control',  'maxlength' => '20']) 
							!!}	
						</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
					@endif
				@endif
			</div><!-- /div .list-group-item -->
		</div><!-- /div .list-group -->
	@endif

<script>

	$('#rut').change(function(){
		ValidarRut($('#rut').val());
	});
	$('#rut').keyup(function(e){
		if (e.keyCode === 13){
			ValidarRut($('#rut').val());
		}
	});
	$('.form-control').keyup(function(e){
	});
	function ValidarRut(rut){
		console.log('click');
		var route = 'http://localhost:8000/validarrutusuario/'+rut+'';
		document.getElementById('FormUsuario').onsubmit = function() {
		    return false;
		}	
		$.get(route, function(res){
			
			if(res !== 'false'){
				$('#rut').val(res);
				document.getElementById('FormUsuario').onsubmit = function() {
				    return true;
				}											
			}else{
				$('#rut').val('');
				$('#rut').focus();
				alert('Formato de rut invalido');
				
			}
		});
	}
	$('#imagen_perfil').change(function(){
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
			$('#Perfil').addClass('btn btn-success btn-xs').text('ok');
		}
	});

	$('#imagen_portada').change(function(){
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
			$('#Portada').addClass('btn btn-success btn-xs').text('ok');
		}
	});

</script>