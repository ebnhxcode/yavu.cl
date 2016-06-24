
	<div class='list-group'>
		<div class='list-group-item list-group-item-success'>
			DATOS PRINCIPALES
		</div><!-- /div .list-group-item .success -->
		<div class='list-group-item'>
			<div class='form-group has-feedback has-feedback-left'>
				@include('alerts.showThatIsRequired')
				{!!Form::label('Nombre:')!!}
				{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre', 'maxlength' => '100'])!!}
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			<div class='form-group has-feedback has-feedback-left'>
				@include('alerts.showThatIsRequired')
				{!!Form::label('Apellido:')!!}
				{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido', 'maxlength' => '100'])!!}
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			<div class='form-group has-feedback has-feedback-left'>
				@include('alerts.showThatIsRequired')
				{!!Form::label('Email login:')!!}
				{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email', 'maxlength' => '200'])!!}			
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			<div class='form-group has-feedback has-feedback-left'>
					@if(Request::path() != 'usuarios/create')
						(<strong><small><span class='requerido'>Ingrese <i>solo</i> si desea cambiarla</span></small></strong>)
						{!!Form::label('Cambio de clave:')!!}
					@else
						@include('alerts.showThatIsRequired')
						{!!Form::label('Nueva password:')!!}
					@endif
				{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una password', 'maxlength' => '100'])!!}
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			<div class='form-group has-feedback has-feedback-left'>
				@include('alerts.showThatIsRequired')
				{!!Form::label('Ciudad:')!!}
				{!!Form::select('ciudad', 
					['Tarapacá' => 'Tarapacá',
					'Parinacota' => 'Parinacota',
					'Arica' => 'Arica',
					'Antofagasta' => 'Antofagasta',
					'Atacama' => 'Atacama',
					'La Serena' => 'La Serena', 
					'Coquimbo' => 'Coquimbo', 
					'Valparaiso' => 'Valparaiso',
					'Aconcagua' => 'Aconcagua',
					'Región Metropolitana' => 'Región Metropolitana',
					'O Higgins' => 'O Higgins',
					'Curicó' => 'Curicó',
					'Talca' => 'Talca',
					'Linares' => 'Linares',
					'Maule' => 'Maule',
					'Ñuble' => 'Ñuble',
					'Concepción' => 'Concepción',
					'Arauco' => 'Arauco',
					'Biobío' => 'Biobío',	
					'Malleco' => 'Malleco',
					'Cautín' => 'Cautín',
					'Araucanía' => 'Araucanía',
					'Los Ríos' => 'Los Ríos',
					'Valdivia' => 'Valdivia',
					'Osorno' => 'Osorno',
					'Los Lagos' => 'Los Lagos',
					'Llanquihue' => 'Llanquihue',	
					'Chiloé' => 'Chiloé',	
					'Aysen' => 'Aysen',	
					'Magallanes' => 'Magallanes',	
					'otra' => 'otras...'], 
					$selected = null, ['class' => 'form-control', 'maxlength' => '100']) 
				!!}		
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			@if (!Auth::user()->check())
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::hidden('tipo_usuario', 'Usuario')!!}
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
				<div class='form-group has-feedback has-feedback-left'>
					{!!Form::hidden('estado', 'Activo')!!}	
				</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			@endif
		</div><!-- /div .list-group-item -->
		<!-- GESTION DE LAS FOTOS -->		
		<div class='list-group-item'>
			<div class='form-group has-feedback has-feedback-left'>
				(<strong><small><span class='requerido'>Solo jpg, png</span></small></strong>) {!!Form::label('Cambiar foto de perfil:')!!}<span id='Perfil'></span><br>
				<span class='btn-file btn-md'>
					Buscar imagen{!!Form::file('imagen_perfil', ['id' => 'imagen_perfil',  'maxlength' => '255',  'size' => '2048'])!!}
				</span><!-- /span .btn-file .btn-md -->
				<img width='15%' id='ImagenPerfil' class='thumbnail img-responsive-centered' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'usuario_nuevo.png' !!}' class='center-block'>
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
			<div class='form-group has-feedback has-feedback-left'>
				(<strong><small><span class='requerido'>Solo jpg, png</span></small></strong>) {!!Form::label('Cambiar portada:')!!}<span id='Portada'></span><br>
				<span class='btn-file btn-md'>
					Buscar imagen{!!Form::file('imagen_portada', ['id' => 'imagen_portada',  'maxlength' => '255', 'size' => '2048'])!!}
				</span>
				<img width='35%' id='ImagenPortada' class='thumbnail img-responsive-centered' src='/img/users/{!! isset($user)?($user->imagen_portada!='')?$user->imagen_portada:'banner.png':'banner.png' !!}' width=100%>
			</div><!-- /div .form-group .has-feedback .has-feedback-left  -->
		</div><!-- /div .list-group-item -->
	</div><!-- /div .list-group -->
</div><!-- /div .col-md8-sm8-xs12 -->
<div class='col-md-4 col-sm-4 col-xs-12'>
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