<div>
	<table class="table">
		<tr>
			<td colspan="2" width="95%">¡Registrate Ya con nosotros y se parte de la comunidad de beneficios!</td>
			<td width="5%">*<small>(Campos requeridos)</small></td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td>{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre','required'=>'required'])!!}</td>
			<td>*</td>
		</tr>
		<tr>
			<td>Apellido</td>
			<td>{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido','required'=>'required'])!!}</td>
			<td>*</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','required'=>'required'])!!}			
			</td>
			<td>*</td>
		</tr
		<tr>
			<td>Clave</td>
			<td>
				{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una clave'])!!}						
			</td>
			<td>*</td>
		</tr>
		<div>
		<tr>
			<td>Seleccione su ciudad</td>
			<td>
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
					$selected = null, ['class' => 'form-control']) 
				!!}			
			</td>
			<td>*</td>
		</tr>	
	</table>
</div>

