<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Nombre:')!!}
				{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre', 'maxlength' => '100'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Apellido:')!!}
				{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido', 'maxlength' => '100'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Email:')!!}
				{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email', 'max,length' => '200'])!!}			
			</div>
			<div class="form-group has-feedback has-feedback-left">
				@if(Auth::user()->check() && Request::path() !== 'usuarios/create')
					{!!Form::label('Cambio de clave:')!!}		
				@else
					{!!Form::label('Nueva clave:')!!}
				@endif
				{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una clave', 'maxlength' => '100'])!!}		
			</div>
			<div class="form-group has-feedback has-feedback-left">
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
			</div>	
			@if (!Auth::user()->check())
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::hidden('tipo_usuario', 'Usuario')!!}
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::hidden('estado', 'Activo')!!}	
				</div>			
			@endif
		</div>
		<!-- GESTION DE LAS FOTOS -->		
		<div class="list-group-item">


			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Cambiar avatar:')!!}<br>
				<div style="border: dashed; border-width: 1px;">
					<span class="btn btn-primary btn-file btn-md">
						Buscar imagen{!!Form::file('imagen_perfil', ['id' => 'imagen_perfil',  'maxlength' => '255'])!!}
					</span>
					@if(Request::path() !== 'usuarios/create' && Auth::user()->check())
						@if(Auth::user()->get()->imagen_perfil === "")
							<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png" alt="...">
						@else
							<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="/img/users/{{Auth::user()->get()->imagen_perfil}}" alt="...">
						@endif
					@else
						<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png" alt="...">
					@endif
				</div>
					

			</div>

			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Cambiar banner personal:')!!}<br>
				<div style="border: dashed; border-width: 1px;">
					<span class="btn btn-primary btn-file btn-md">
						Buscar imagen{!!Form::file('imagen_portada', ['id' => 'imagen_portada',  'maxlength' => '255'])!!}
					</span>
					@if(Request::path() !== 'empresas/create' && Auth::user()->check())
						@if(Auth::user()->get()->imagen_portada === "")
							<img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png" alt="...">
						@else
							<img width="35%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="/img/users/{{Auth::user()->get()->imagen_portada}}" alt="...">
						@endif
					@else
						<img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png" alt="...">
					@endif
				</div>
			</div>						
		</div>		

	</div>
</div>
<div class="col-sm-4">
	@if(Auth::user()->check() or Auth::admin()->check())
		<div class="list-group" >
			<div class="list-group-item">
				<h4>Datos de Contacto</h4>
			</div>
			<div class="list-group-item">
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Rut:')!!}
					{!!Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese su rut', 'id' => 'rut', 'maxlength' => '16'])!!}
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Nickname:')!!}
					{!!Form::text('login',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre de usuario' 'maxlength' => '100'])!!}			
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Dirección:')!!}
					{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese dirección', 'maxlength' => '100'])!!}
				</div>
				<div class="form-group has-feedback has-feedback-left">
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
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('País:')!!}
					{!!Form::select('pais', 
						['Argentina' => 'Argentina',
						'Bolivia' => 'Bolivia',	
						'Brasil' => 'Brasil',	
						'Colombia' => 'Colombia',	
						'Chile' => 'Chile',	
						'Ecuador' => 'Ecuador',	
						'Mexico' => 'Mexico',	
						'Panama' => 'Panama',	
						'Paraguay' => 'Paraguay',	
						'Venezuela' => 'Venezuela',	
						'Uruguay' => 'Uruguay',	
						'Otro' => 'Otro'], 
						$selected = null, ['class' => 'form-control', 'maxlength' => '100']) 
					!!}	
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Teléfono Movil:')!!}
					{!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '16'])!!}
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Teléfono Fijo:')!!}
					{!!Form::text('fono_2',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '16'])!!}
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Sexo:')!!}
					{!!Form::select('sexo', 
						['Masculino' => 'Masculino',
						'Femenino' => 'Femenino',	
						'Otro' => 'Otro'], 
						$selected = null, ['class' => 'form-control', 'maxlength' => '10']) 
					!!}		
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Cumpleaños:')!!}
					{!!Form::date('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '100'])!!}
				</div>

				@if (Auth::admin()->check()||Auth::user()->check())
					<div class="form-group has-feedback has-feedback-left">
						{!!Form::hidden('estado', 'Activo', ['maxlength' => '100'])!!}	
					</div>	
					@if (Auth::admin()->check())
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::label('Tipo usuario:')!!}
							{!!Form::select('tipo_usuario', 
								['Usuario' => 'Usuario',
								'Cliente' => 'Cliente'], 
								$selected = null, ['class' => 'form-control',  'maxlength' => '20']) 
							!!}	
						</div>						
					@endif
				@endif
			</div>
		</div>
	@endif
<!--</div>-->
<script>

	$("#rut").change(function(){
		ValidarRut($("#rut").val());
	});
	$("#rut").keyup(function(e){
		if (e.keyCode === 13)
		{
			ValidarRut($("#rut").val());
		}
	});
	$(".form-control").keyup(function(e){

	});
	function ValidarRut(rut){
		console.log("click");
		var route = "http://localhost:8000/validarrutusuario/"+rut+"";
		document.getElementById('FormUsuario').onsubmit = function() {
		    return false;
		}	
		$.get(route, function(res){
			
			if(res !== 'false'){
				$("#rut").val(res);
				document.getElementById('FormUsuario').onsubmit = function() {
				    return true;
				}											
				//console.log(res);
			}else{						
				$("#rut").val("");
				$("#rut").focus();
				alert('Formato de rut invalido');
				
			}
		});
	}
	$("#imagen_perfil, #imagen_portada").change(function(){
		var formato = this.value;
		var formatosPermitidos = ["jpg", "jpeg", "png", "gif"];
		formato = formato.split('.');
		if(formatosPermitidos.indexOf(formato[1]) < 0)
		{
			this.value = "";
			alert('Formato de imagen invalido, no se subirá');
		}
		console.log(this.value);
	});		
</script>