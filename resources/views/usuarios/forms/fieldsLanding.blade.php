<div class="form-group has-feedback has-feedback-left">
	(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Nombre:')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre','required'=>'required'])!!}
</div>		
<div class="form-group has-feedback has-feedback-left">
	(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Apellido:')!!}
	{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido','required'=>'required'])!!}
</div>
<div class="form-group has-feedback has-feedback-left">
	(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Email:')!!}
	{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','required'=>'required'])!!}			
</div>
<div class="form-group has-feedback has-feedback-left">
	(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Clave:')!!}
	{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una clave', 'required' => 'required'])!!}
</div>

<div class="form-group has-feedback has-feedback-left">
	(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Codigo Referido:')!!}
	{!!Form::text('referido',null,['class'=>'form-control','placeholder'=>''])!!}
</div>


<div class="form-group has-feedback has-feedback-left">
	(<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Ciudad:')!!}
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
		$selected = null, ['class' => 'form-control', 'required' => 'required'])
	!!}					
</div>
<div class="form-group has-feedback has-feedback-left">
	{!!Form::hidden('tipo_usuario', 'Usuario')!!}
</div>
<div class="form-group has-feedback has-feedback-left">
	{!!Form::hidden('estado', 'Activo')!!}	
</div>

