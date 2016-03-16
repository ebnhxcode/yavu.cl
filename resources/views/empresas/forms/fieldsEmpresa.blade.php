<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
		@if(Request::path() === 'empresas/create' && Auth::user()->check())			
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Nombre:')!!}
				{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la empresa', 'maxlength' => '100'])!!}
			</div>
		@endif
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Email:')!!}
				{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese email de la empresa', 'maxlength' => '200'])!!}
				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			</div>
			<!--
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Clave:')!!}
				{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una clave', 'maxlength' => '100'])!!}			
				<i class="form-control-feedback glyphicon glyphicon-lock"></i>
			</div>
			-->

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
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Descripción:')!!}
				{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Agregue una breve descripción de su empresa', 'maxlength'=>'999', 'style'=>'resize:none;', 'rows'=>'5', 'id'=>'descripción'])!!}
			</div>

		</div>
		<!-- GESTION DE LAS FOTOS -->

		@if(isset($empresa))
			<div class="list-group-item">
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Cambiar avatar:')!!}<br>
					<div style="border: dashed; border-width: 1px;">
						<span class="btn btn-primary btn-file btn-md">
							Buscar imagen{!!Form::file('imagen_perfil', ['id' => 'imagen_perfil',  'maxlength' => '255'])!!}
						</span>
						@if(Request::path() !== 'empresas/create')
							@if($empresa->imagen_perfil==="")
								<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png" alt="...">
							@else
								<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="/img/users/{{$empresa->imagen_perfil}}" alt="...">
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
							Buscar imagen{!!Form::file('imagen_portada', ['id' => 'imagen_portada', 'maxlength' => '255'])!!}
						</span>
						@if(Request::path() !== 'empresas/create')
							@if($empresa->imagen_portada==="")
								<img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png" alt="...">
							@else
								<img width="35%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="/img/users/{{$empresa->imagen_portada}}" alt="...">
							@endif
						@else
							<img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png" alt="...">
						@endif
					</div>
				</div>
			</div>			
		@endif

	</div>
</div>


	<div class="col-sm-4">
		<div class="list-group" >
			<div class="list-group-item">
				<h4>Datos de Contacto</h4>
			</div>
			<div class="list-group-item">
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Rut:')!!}
					{!!Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese rut de la empresa', 'id' => 'rut',  'maxlength' => '16'])!!}			
					<i class="form-control-feedback glyphicon glyphicon-user"></i>
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
					{!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Celular', 'maxlength' => '20'])!!}
				</div>

				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Teléfono Fijo:')!!}
					{!!Form::text('fono_2',null,['class'=>'form-control','placeholder'=>'Teléfono fijo', 'maxlength' => '20'])!!}
				</div>

				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Fecha de inicio:')!!}
					{!!Form::date('fecha_creacion',null,['class'=>'form-control','placeholder'=>'Inicio de actividad', 'maxlength' => '100'])!!}
				</div>

				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Nombre del encargado:')!!}
					{!!Form::text('nombre_ecargado',null,['class'=>'form-control','placeholder'=>'Encargado de la empresa', 'maxlength' => '100'])!!}
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('tipo_servicio:')!!}
					{!!Form::select('tipo_servicio', 
						['Gratis' => 'Gratis',
						'Pagado' => 'Pagado'], 
						$selected = null, ['class' => 'form-control', 'maxlength' => '100']) 
					!!}	
				</div>
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Fecha de pago:')!!}
					{!!Form::date('fecha_de_pago',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '100'])!!}
				</div>

					@if (Auth::admin()->check()) 

				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Ingrese monto cancelado:')!!}
					{!!Form::text('monto_pagado',null,['class'=>'form-control','placeholder'=>'', 'maxlength' => '100'])!!}
				</div>

					@endif	
				
				@if (Auth::user()->check())
					<div class="form-group has-feedback has-feedback-left">
						{!!Form::hidden('user_id', Auth::user()->get()->id )!!}
					</div>		
					<div class="form-group has-feedback has-feedback-left">
						{!!Form::hidden('estado', 'Activo', [ 'maxlength' => '30'])!!}	
						<!-- con esto queda pendiente cada vez que se cambie la info-->
					</div>						
				@endif				

			</div>
		</div>
	<!--</div>-->


  	 <div class="form-group has-feedback has-feedback-left">
      {!!Form::hidden('estado_sorteo', 'Pendiente')!!} 
    </div>             
 

   		@if (Auth::admin()->check()) 

				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Estado Empresa:')!!}		
					{!!Form::select('estado', 
						['Pendiente' => 'Pendiente',	
						'Aprobado' => 'Aprobado'], 
						$selected = null, ['class' => 'form-control', 'maxlength' => '30']) 
					!!}	

				</div>

			@endif 
<script>
	$("#rut").change(function(){
		ValidarRut($("#rut").val());
	});
	function ValidarRut(rut){
		console.log("click");
		var route = "http://186.64.123.143/validarrutempresa/"+rut+"";

		//Si esto esta aqui valida el rut solo cuando la empresa se edita, tambien valida que el rut sea valido antes del registro
		document.getElementById('FormEmpresa').onsubmit = function() {
		    return false;
		}
		$.get(route, function(res){
			
			if(res !== 'false'){
				$("#rut").val(res);
				document.getElementById('FormEmpresa').onsubmit = function() {
				    return true;
				}							
			}else{				
				$("#rut").val("");
				$("#rut").focus();
				alert('Formato de rut invalido');
			}
		});
		
	}
	$(".form-control").keyup(function(e){
		//console.log(e.keyCode);
	});
	$(".form-control").change(function(){
		$(this).val(NormalizarInputs(SanearInputs($(this).val())));
	});

	function SanearInputs(Busqueda)
	{
		Busqueda = Busqueda.replace(String.fromCharCode(32), '+');
		Busqueda = Busqueda.replace('     ', '');
		Busqueda = Busqueda.replace('    ', '');
		Busqueda = Busqueda.replace('   ', '');
		Busqueda = Busqueda.replace('  ', '');
		Busqueda = Busqueda.replace('+++', '');
		Busqueda = Busqueda.replace('++', '');		
		Busqueda = Busqueda.replace('=', '');
		Busqueda = Busqueda.replace("'or'", '');
		Busqueda = Busqueda.replace("'and'", '');
		Busqueda = Busqueda.replace("script", '');
		Busqueda = Busqueda.replace("/", '');
		Busqueda = Busqueda.replace("'''", '');
		Busqueda = Busqueda.replace("''", '');
		Busqueda = Busqueda.replace("'", '');
		Busqueda = Busqueda.replace('<', '');
		Busqueda = Busqueda.replace('>', '');

		if(Busqueda.indexOf(String.fromCharCode(32)) > -1 || Busqueda.indexOf(String.fromCharCode(219)) > -1 || Busqueda.indexOf(String.fromCharCode(48)) > -1 || Busqueda.indexOf(String.fromCharCode(16)) > -1)
		{          
			return SanearInputs(Busqueda);
		}
		
		
		
		console.log(Busqueda.indexOf(String.fromCharCode(187)));

		return Busqueda;
	}
	function NormalizarInputs(Busqueda)
	{
		if (Busqueda.indexOf('+') > -1)
		{
			Busqueda = Busqueda.replace('+', ' ');
			return NormalizarInputs(Busqueda);
		}
		return Busqueda;
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