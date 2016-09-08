<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
		@if(Request::path() === 'empresas/create' && Auth::user()->check())		
			<div class="form-group has-feedback has-feedback-left">
				(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Nombre Único de empresa:')!!}
				{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la empresa', 'maxlength' => '100'])!!}
			</div>
		@endif
			<div class="form-group has-feedback has-feedback-left">
				(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Email:')!!}
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
				(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Ciudad:')!!}
				{!!Form::select('ciudad',
              ['Región de Arica y Parinacota' =>
                ['Arica' => 'Arica',
                'Putre' => 'Putre'],
              'Región de Tarapacá' =>
                ['Iquique' => 'Iquique',
                'Alto Hospicio' => 'Alto Hospicio',
                'Pica' => 'Pica'],
              'Región de Antofagasta' =>
                ['Antofagasta' => 'Antofagasta',
                'Mejillones' => 'Mejillones',
                'Taltal' => 'Taltal',
                'Calama' => 'Calama',
                'Ollagüe' => 'Ollagüe',
                'San Pedro de Atacama' => 'San Pedro de Atacama',
                'Tocopilla' => 'Tocopilla'],
              'Región de Atacama' =>
                ['Copiapó' => 'Copiapó',
                'Caldera' => 'Caldera',
                'El Salvador' => 'El Salvador',
                'Chañaral' => 'Chañaral',
                'Diego de Almagro' => 'Diego de Almagro',
                'Vallenar' => 'Vallenar',
                'Huasco' => 'Huasco'],
              'Región de Coquimbo' =>
                ['La Serena' => 'La Serena',
                'Coquimbo' => 'Coquimbo',
                'Vicuña' => 'Vicuña',
                'Illapel' => 'Illapel',
                'Los Vilos' => 'Los Vilos',
                'Ovalle' => 'Ovalle',
                'Combarbalá' => 'Combarbalá'],
              'Región de Valparaiso' =>
                ['Valparaiso' => 'Valparaiso',
                'Viña del Mar' => 'Viña del Mar',
                'Casablanca' => 'Casablanca',
                'Concón' => 'Concón',
                'San Felipe' => 'San Felipe',
                'Olmué' => 'Olmué',
                'Villa Alemana' => 'Villa Alemana',
                'Quilpué' => 'Quilpué',
                'Los Andes' => 'Los Andes',
                'La Ligua' => 'La Ligua',
                'Papudo' => 'Papudo',
                'Zapallar' => 'Zapallar',
                'Quillota' => 'Quillota',
                'Calera' => 'Calera',
                'San Antonio' => 'San Antonio',
                'Algarrobo' => 'Algarrobo',
                'Cartagena' => 'Cartagena'],
              'Región Metropolitana' =>
                ['Colina' => 'Colina',
                'Melipilla' => 'Melipilla',
                'San José de Maipo' => 'San José de Maipo',
                'Santiago' => 'Santiago',
                'Cerrillos' => 'Cerrillos',
                'Cerro Navia' => 'Cerro Navia',
                'Conchalí' => 'Conchalí',
                'El Bosque' => 'El Bosque',
                'Estación Central' => 'Estación Central',
                'Huechuraba' => 'Huechuraba',
                'Independencia' => 'Independencia',
                'La Cisterna' => 'La Cisterna',
                'La Florida' => 'La Florida',
                'La Granja' => 'La Granja',
                'La Pintana' => 'La Pintana',
                'La Reina' => 'La Reina',
                'Las Condes' => 'Las Condes',
                'Lo Barnechea' => 'Lo Barnechea',
                'Lo Espejo' => 'Lo Espejo',
                'Lo Prado' => 'Lo Prado',
                'Macul' => 'Macul',
                'Maipú' => 'Maipú',
                'Ñuñoa' => 'Ñuñoa',
                'Pedro Aguirre Cerda' => 'Pedro Aguirre Cerda',
                'Peñalolén' => 'Peñalolén',
                'Providencia' => 'Providencia',
                'Pudahuel' => 'Pudahuel',
                'Quilicura' => 'Quilicura',
                'Quinta Normal' => 'Quinta Normal',
                'Recoleta' => 'Recoleta',
                'Renca' => 'Renca',
                'San Joaquín' => 'San Joaquín',
                'San Miguel' => 'San Miguel',
                'San Ramón' => 'San Ramón',
                'Vitacura' => 'Vitacura'],
              'Región de O Higgins' =>
                ['Rancagua' => 'Rancagua',
                'Rengo' => 'Rengo',
                'San Fernando' => 'San Fernando',
                'Pichilemu' => 'Pichilemu',
                'Santa Cruz' => 'Santa Cruz',
                'San Vicente' => 'San Vicente',
                'Chimbarongo' => 'Chimbarongo'],
              'Región del Maule' =>
                ['Curicó' => 'Curicó',
                'Talca' => 'Talca',
                'Constitución' => 'Constitución',
                'Linares' => 'Linares',
                'Cauquenes' => 'Cauquenes',
                'Maule' => 'Maule',
                'Parral' => 'Parral',
                'Molina' => 'Molina',
                'San Clemente' => 'San Clemente',
                'San Rafael' => 'San Rafael'],
              'Región del Biobío' =>
                ['Chillán' => 'Chillán',
                'Concepción' => 'Concepción',
                'Los Ángeles' => 'Los Ángeles',
                'Talcahuano' => 'Talcahuano',
                'Coronel' => 'Coronel',
                'Chiguayante' => 'Chiguayante',
                'Curanilahue' => 'Curanilahue',
                'Lebu' => 'Lebu',
                'San Rosendo' => 'San Rosendo',
                'Bulnes' => 'Bulnes',
                'Cobquecura' => 'Cobquecura'],
              'Región de la Araucanía' =>
                ['Temuco' => 'Temuco',
                'Angol' => 'Angol',
                'Puerto Saavedra' => 'Puerto Saavedra',
                'Villarrica' => 'Villarrica',
                'Pucón' => 'Pucón',
                'Lonquimay' => 'Lonquimay',
                'Collipulli' => 'Collipulli'],
              'Región de Los Ríos' =>
                ['Valdivia' => 'Valdivia',
                'Panguipulli' => 'Panguipulli',
                'La Unión' => 'La Unión',
                'Río Bueno' => 'Río Bueno',
                'Lago Ranco' => 'Lago Ranco'],
              'Región de Los Lagos' =>
                ['Osorno' => 'Osorno',
                'Puerto Montt' => 'Puerto Montt',
                'Ancud' => 'Ancud',
                'Castro' => 'Castro',
                'Cochamó' => 'Cochamó',
                'Quellón' => 'Quellón',
                'Chaitén' => 'Chaitén',
                'Frutillar' => 'Frutillar',
                'LLanquihue' => 'Llanquihue',
                'Futaleufú' => 'Futaleufú'],
              'Región de Aysén' =>
                ['Melinka' => 'Melinka',
                'Lago Verde' => 'Lago Verde',
                'Puerto Cisnes' => 'Puerto Cisnes',
                'Puerto Aysén' => 'Puerto Aysén',
                'Coyhaique' => 'Coyhaique',
                'Balmaceda' => 'Balmaceda',
                'Puerto Ibañez' => 'Puerto Ibañez',
                'Chile Chico' => 'Chile Chico',
                'Cochrane' => 'Cochrane',
                'Caleta Tortel' => 'Caleta Tortel',
                'Villa O Higgins' => 'Villa O Higgins'],
              'Región de Magallanes y la Antártica' =>
                ['Torres del Paine' => 'Torres del Paine',
                'Puerto Natales' => 'Puerto Natales',
                'Punta Arenas' => 'Punta Arenas',
                'Porvenir' => 'Porvenir',
                'Puerto Williams' => 'Puerto Williams']],
              $selected = null, ['class' => 'form-control', 'required' => 'required'])
				!!}			
			</div>	
			<div class="form-group has-feedback has-feedback-left">
				(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Descripción:')!!}
				{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Agregue una breve descripción de su empresa', 'maxlength'=>'999', 'rows'=>'5', 'id'=>'descripción'])!!}
			</div>

		</div>
		<!-- GESTION DE LAS FOTOS -->

			<div class="list-group-item">
				<div class="form-group has-feedback has-feedback-left">
					(<strong><small><span class="requerido">Solo jpg, png</span></small></strong>) {!!Form::label('Logo: ')!!}<span id="Perfil" ></span><br>
					<div>
						<span class="btn-file btn-sm">
							Buscar logo{!!Form::file('imagen_perfil', ['id' => 'imagen_perfil',  'maxlength' => '255', 'size' => '2048'])!!}
						</span>
						@if(Request::path() !== 'empresas/create' && isset($empresa))
							@if($empresa->imagen_perfil==="")
								<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="/img/users/usuario_nuevo.png" alt="...">
							@else
								<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="/img/users/{!!$empresa->imagen_perfil!!}" alt="...">
							@endif
						@else
							<img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="/img/users/usuario_nuevo.png" alt="...">
						@endif
					</div>
				</div>

				<div class="form-group has-feedback has-feedback-left">
					(<strong><small><span class="requerido">Solo jpg, png</span></small></strong>) {!!Form::label('Cambiar imagen de portada: ')!!}<span id="Portada"></span><br>
					<div>
						<span class="btn-file btn-sm">
							Buscar imagen{!!Form::file('imagen_portada', ['id' => 'imagen_portada', 'maxlength' => '255', 'size' => '2048'])!!}
						</span>
						@if(Request::path() !== 'empresas/create' && isset($empresa))
							@if($empresa->imagen_portada==="")
								<img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="/img/users/banner.png" alt="...">
							@else
								<img width="35%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="/img/users/{!!$empresa->imagen_portada!!}" alt="...">
							@endif
						@else
							<img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="/img/users/banner.png" alt="...">
						@endif
					</div>
				</div>
			</div>			

	</div>
</div>


	<div class="col-sm-4">
		<div class="list-group" >
			<div class="list-group-item">
				<h4>Datos de Contacto</h4>
			</div>
			<div class="list-group-item">
				<div class="form-group has-feedback has-feedback-left">
					(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Rut	:')!!} <small>(Si no lo tiene ingrese su rut personal)</small>
					{!!Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese rut de la empresa', 'id' => 'rut',  'maxlength' => '16'])!!}			
					<i class="form-control-feedback glyphicon glyphicon-user"></i>
				</div>

				<div class="form-group has-feedback has-feedback-left">
					(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Dirección:')!!}
					{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese dirección', 'maxlength' => '100'])!!}
				</div>

				<div class="form-group has-feedback has-feedback-left">
					(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Región:')!!}
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
					(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('País:')!!}
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
				</div>

				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Teléfono Movil:')!!}
					{!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Celular', 'maxlength' => '20'])!!}
				</div>

				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Teléfono Fijo:')!!}
					{!!Form::text('fono_2',null,['class'=>'form-control','placeholder'=>'Teléfono fijo', 'maxlength' => '20'])!!}
				</div>
				<!--
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Fecha de inicio de actividades:')!!}
					{!!Form::date('fecha_creacion',null,['class'=>'form-control','placeholder'=>'Inicio de actividad', 'maxlength' => '100'])!!}
				</div>
				-->
				<div class="form-group has-feedback has-feedback-left">
					(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Nombre del encargado:')!!}
					{!!Form::text('nombre_encargado',null,['class'=>'form-control','placeholder'=>'Encargado de la empresa', 'maxlength' => '100'])!!}
				</div>
				<!--
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
				-->
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
		var route = "http://192.168.1.42/validarrutempresa/"+rut+"";
		document.getElementById('FormEmpresa').onsubmit = function() {
		    return false;
		}
		$.get(route, function(res){
			if(res === 'registrado'){
				$("#rut").val("");
				$("#rut").focus();
				alert('El rut ya se encuentra registrado');
			}
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

	$("#imagen_perfil").change(function(){
		var formato = this.value;
		var formatosPermitidos = ["jpg", "jpeg", "png", "gif"];
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
			$("#Perfil").addClass('btn btn-success btn-xs').text('ok');
		}
	});

	$("#imagen_portada").change(function(){
		var formato = this.value;
		var formatosPermitidos = ["jpg", "jpeg", "png", "gif"];
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
			$("#Portada").addClass('btn btn-success btn-xs').text('ok');
		}
	});



</script>
